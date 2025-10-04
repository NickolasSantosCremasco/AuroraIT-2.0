<?php
// 🟢 1. INICIA A SESSÃO (Essencial para manter o PDO e autenticação se for necessário)
session_start();

// Caminhos ajustados: assumindo que este arquivo está em /src/pages/
require __DIR__ . '/../database/config.php'; 
require __DIR__ . '/../database/vendor/autoload.php'; 

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../../'); 
$dotenv->load(); 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$message = '';
$message_class = ''; 

// A. Tratar mensagens de status da URL
if (isset($_GET['status']) && isset($_GET['msg'])) {
    $message = htmlspecialchars($_GET['msg']);
    $message_class = ($_GET['status'] == 'sucesso') ? 'alert-success' : 'alert-danger';
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);

    // 1. Validação de formato de e-mail
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
         header("Location: " . $_SERVER['PHP_SELF'] . "?status=erro&msg=" . urlencode("Formato de e-mail inválido."));
         exit;
    }

    // A. Verificar se o e-mail existe
    $stmt = $pdo->prepare("SELECT id FROM usuarios WHERE email = :email");
    $stmt->execute(['email' => $email]);
    $user = $stmt->fetch();

    if (!$user) {
        // Por segurança, NUNCA diga se o e-mail existe ou não.
        // Diga que o e-mail foi enviado para evitar vazamento de informação, mas não faça nada.
        header("Location: " . $_SERVER['PHP_SELF'] . "?status=sucesso&msg=" . urlencode("Se o e-mail estiver cadastrado, o link de redefinição será enviado. Verifique sua caixa de entrada/spam."));
        exit;
    }

    // B. Gerar e salvar token
    $token = bin2hex(random_bytes(32));
    $expira = date('Y-m-d H:i:s', strtotime('+1 hour'));

    $stmt = $pdo->prepare("UPDATE usuarios SET token = :token, token_expira = :expira WHERE id = :id");
    $stmt->execute([
        'token' => $token,
        'expira' => $expira,
        'id' => $user['id']
    ]);

    // C. Enviar e-mail de redefinição
    $mail = new PHPMailer(true);
    try {
        // Configurações SMTP
        $mail->isSMTP();
        $mail->Host = $_ENV['SMTP_HOST'];
        $mail->SMTPAuth = true;
        $mail->Username = $_ENV['SMTP_USERNAME'];
        $mail->Password = $_ENV['SMTP_PASSWORD'];
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;
        $mail->CharSet = 'UTF-8';
        
        // 🟢 Adiciona a opção de Debug para diagnóstico, se necessário:
        // $mail->SMTPDebug = 3; 

        // 🟢 Melhor tratamento SSL para ambiente local (recomendado)
        if (strpos($_SERVER['HTTP_HOST'], 'localhost') !== false) {
             $mail->SMTPOptions = [
                 'ssl' => [
                     'verify_peer' => false,
                     'verify_peer_name' => false,
                     'allow_self_signed' => true,
                 ]
             ];
        }

        // Remetente e Destinatário
        $mail->setFrom($_ENV['SMTP_USERNAME'], 'Aurora IT Suporte'); // Use um nome mais formal
        $mail->addAddress($email);

        // 🟢 Montagem CORRETA do link de redefinição (mais dinâmico)
        $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
        $dominio = $_SERVER['HTTP_HOST'];
        
        // 🛑 CORRIGIDO: O destino do link é a página de reset real (provavelmente 'reset_senha.php' ou a mesma 'esqueci.php' com o token)
        // Se a página que recebe o token é a "reset_senha.php", ajuste o caminho abaixo.
        $caminho_base = str_replace('esqueci_senha.php', 'reset_senha.php', $_SERVER['PHP_SELF']); 
        $linkRedefinicao = "{$protocol}{$dominio}{$caminho_base}?token=$token";

        // Conteúdo do E-mail
        $mail->isHTML(true);
        $mail->Subject = 'Redefinição de Senha Solicitada (Aurora IT)';
        $mail->Body = "
            <h2>Redefinição de Senha</h2>
            <p>Você solicitou uma redefinição de senha para o e-mail: <strong>{$email}</strong>.</p>
            <p>Clique no link abaixo para criar uma nova senha:</p>
            <p><a href='{$linkRedefinicao}' style='background-color:#00C9B1; color:white; padding: 10px 20px; text-decoration: none; border-radius: 5px; display: inline-block;'>Redefinir Senha Agora</a></p>
            <p>Este link é válido por 1 hora.</p>
            <p>Se você não solicitou esta redefinição, por favor ignore este e-mail.</p>
        ";
        $mail->AltBody = "Você solicitou uma redefinição de senha. Use este link: {$linkRedefinicao}";

        $mail->send();
        
        // Redireciona com sucesso
        header("Location: " . $_SERVER['PHP_SELF'] . "?status=sucesso&msg=" . urlencode("E-mail de redefinição enviado! Verifique sua caixa de entrada ou spam."));
        exit;
        
    } catch (Exception $e) {
        // Redireciona com erro de envio de e-mail (O $mail->ErrorInfo contém a mensagem do Gmail)
        header("Location: " . $_SERVER['PHP_SELF'] . "?status=erro&msg=" . urlencode("Erro ao enviar e-mail. Tente novamente mais tarde."));
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Esqueci Minha Senha</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    <link rel="stylesheet" href="../css/css-pages/login.css">
    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
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
                    <form method="post" class="myform">
                        <div class="form-group">
                            <input type="email" class="form-control" name="email" placeholder="Seu e-mail" required>
                        </div>
                        <div class="form-group mt-3">
                            <button type="submit" class="btn btn-block btn-primary btn-lg">
                                <small>Enviar link de redefinição</small>
                            </button>
                        </div>
                        <div class="text-center mt-3">
                            <a href="login.php" class="text-decoration-none">Voltar ao Login</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>