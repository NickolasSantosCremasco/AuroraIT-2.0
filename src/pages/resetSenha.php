<?php
// Inclui o arquivo de configuração do banco (que contém $pdo)
require '../database/config.php'; 
require '../database/vendor/autoload.php'; 

$message = '';
$message_class = ''; 
$token_valido = false;
$token = null;

if (isset($_GET['token'])) {
    $token = $_GET['token'];

    // Verifica se o token existe e se não está expirado
    $stmt = $pdo->prepare("SELECT id FROM usuarios WHERE token = :token AND token_expira > NOW()");
    $stmt->execute(['token' => $token]);
    $user = $stmt->fetch();

    if ($user) {
        $token_valido = true;
    } else {
        $message = "Link de redefinição inválido ou expirado. Por favor, solicite um novo link.";
        $message_class = 'alert-danger';
    }
} else if (isset($_POST['token'])) {
    // Se for POST, o token será validado no passo 2
    $token_valido = true; 
} else {
    $message = "Acesso inválido. Nenhum token de redefinição fornecido.";
    $message_class = 'alert-danger';
}

// =================================================================
// 2. LÓGICA DE ATUALIZAÇÃO DA SENHA (POST)
// =================================================================
if ($_SERVER['REQUEST_METHOD'] === 'POST' && $token_valido) {
    
    $token = $_POST['token'];
    $nova_senha = $_POST['nova_senha'];
    $confirma_senha = $_POST['confirma_senha'];
    
    // Revalida o token antes de processar o POST
    $stmt = $pdo->prepare("SELECT id FROM usuarios WHERE token = :token AND token_expira > NOW()");
    $stmt->execute(['token' => $token]);
    $user = $stmt->fetch();
    
    if (!$user) {
        $message = "Link de redefinição inválido ou expirado. Por favor, solicite um novo link.";
        $message_class = 'alert-danger';
        $token_valido = false; // Bloqueia o formulário
    } 
    else if (strlen($nova_senha) < 6) {
        $message = "A senha deve ter no mínimo 6 caracteres.";
        $message_class = 'alert-danger';
    }
    else if ($nova_senha !== $confirma_senha) {
        $message = "As senhas não coincidem.";
        $message_class = 'alert-danger';
    } else {
        try {
            // Criptografa a nova senha antes de salvar
            $senha_hash = password_hash($nova_senha, PASSWORD_DEFAULT);
            $user_id = $user['id'];
            
            // Atualiza a senha e, CRITICAMENTE, remove o token
            $stmt = $pdo->prepare("UPDATE usuarios SET senha = :senha_hash, token = NULL, token_expira = NULL WHERE id = :id");
            $stmt->execute([
                'senha_hash' => $senha_hash,
                'id' => $user_id
            ]);

            $message = "Senha redefinida com sucesso! Você pode fazer login agora.";
            $message_class = 'alert-success';
            $token_valido = false; // Bloqueia o formulário para evitar reenvio
            
            header("Location: ../pages/login.php?status=sucesso&msg=" . $mensagemSucesso);
            exit;

        } catch (PDOException $e) {
            $message = "Ocorreu um erro ao salvar a nova senha no banco de dados. Tente novamente.";
            $message_class = 'alert-danger';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Redefinir Senha</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    <link rel="stylesheet" href="../css/css-pages/login.css">
</head>

<body>
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="row w-100 justify-content-center">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card py-3 px-2">
                    <p class="text-center mb-3 mt-2">Redefinir Senha</p>

                    <?php if (!empty($message)): ?>
                    <div class="alert <?php echo $message_class; ?> alert-dismissible fade show" role="alert">
                        <?php echo $message; ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <?php endif; ?>

                    <?php if ($token_valido): ?>

                    <form method="post" class="myform">

                        <input type="hidden" name="token" value="<?php echo htmlspecialchars($token); ?>">

                        <div class="form-group">
                            <input type="password" class="form-control" name="nova_senha"
                                placeholder="Nova Senha (mínimo 6 caracteres)" required>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="confirma_senha"
                                placeholder="Confirme a Nova Senha" required>
                        </div>
                        <div class="form-group mt-3">
                            <button type="submit" class="btn btn-block btn-primary btn-lg">
                                <small>Atualizar Senha</small>
                            </button>
                        </div>
                    </form>

                    <?php endif; ?>

                    <div class="text-center mt-3">
                        <a href="login.php" class="text-decoration-none">Voltar ao Login</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>