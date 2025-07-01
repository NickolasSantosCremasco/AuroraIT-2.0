<?php
require_once '../database/auth.php';
require_once '../database/config.php';

if (!estaLogado()) {
    header('Location: login.php');
    exit;
}

$usuario_id = $_SESSION['usuario']['id'];
$nivel = $_SESSION['usuario']['nivel'];

if ($nivel == 1) {
    $stmtUsuarios = $pdo->query('SELECT id, nome, email, nivel, data_criacao FROM usuarios ORDER BY nome ASC');
    $usuarios = $stmtUsuarios->fetchAll(PDO::FETCH_ASSOC);
} 
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../img/favicon/favicon.png" type="image/x-icon">

    <!--Bootstrap-->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/css-globais/navbar.css">
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../css/css-pages/perfil.css">

    <title>Aurorability | Perfil</title>


</head>

<!-- Modal para Agendar Consulta -->
<div class="modal fade" id="modalAgendarConsulta" tabindex="-1" aria-labelledby="modalAgendarLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content rounded-4">
            <div class="modal-header">
                <h5 class="modal-title" id="modalAgendarLabel"><i class="fas fa-plus me-2"></i>Agendar Consulta</h5>

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
            </div>
            <div class="modal-body">
                <form id="formAgendamento" method="post" action="../database/criarConsultas.php">
                    <div class="mb-3">
                        <label for="tipoTerapia" class="form-label">Tipo de Terapia</label>
                        <select class="form-select" name="tipoTerapia" id="tipoTerapia" required>
                            <option value="">Selecione uma opção</option>
                            <option value="Terapia Energética">Terapia Grupal</option>
                            <option value="Massagem Terapêutica">Hipnose Terapêutica</option>
                            <option value="Auriculoterapia">Sentimentos Sabotadores</option>
                            <!-- Adicione mais conforme necessário -->
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="dataHora" class="form-label">Data e Hora</label>
                        <input type="datetime-local" class="form-control" name="dataHora" id="dataHora" required>
                    </div>
                    <div class="mb-3">
                        <label for="local" class="form-label">Local</label>
                        <select class="form-select" name="local" id="local" required>
                            <option value="">Selecione</option>
                            <option value="Online (Google Meet)">Online (Google Meet)</option>
                            <option value="Studio Leka Sarandy">Online (Zoom)</option>
                        </select>
                    </div>
                    <input type="hidden" name="usuario_id" id="usuarioSelecionadoId">
                    <button type="submit" class="btn btn-vinho w-100">
                        <i class="fas fa-check me-1"></i> Confirmar Agendamento
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<body>
    <!-- ======== header start ======== -->
    <header class="header">
        <div class="navbar-area">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <nav class="navbar navbar-expand-lg" style="background-color: transparent;">
                            <a class="navbar-brand" href="index.html">
                                <img src="../img/logo/logo.png" alt="Logo" />
                            </a>
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                            </button>

                            <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                                <ul id="nav" class="navbar-nav ms-auto">
                                    <li class="nav-item">
                                        <a class="page-scroll active" href="../../index.php">Home</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="../../index.php">Serviços</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="../pages/planos.php">Planos e Templates</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="page-scroll" href="../../index.php">Redes</a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="../pages/faleconosco.php">Fale conosco</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="../../index.php">Sobre a empresa</a>
                                    </li>


                                    <?php if(estaLogado()) : ?>
                                    <!-- Mostra a imagem do usuário logado -->
                                    <div class="d-flex align-items-center flex-column gap-2"
                                        style="position: relative; bottom: 15px; left: 20px;">
                                        <a href="src/pages/perfil.php" class="perfil">
                                            <img src="https://icon-library.com/images/generic-user-icon/generic-user-icon-9.jpg"
                                                class="border" alt="Usuário"
                                                style="width: 60px; height: 60px; border-radius: 50%;">
                                        </a>
                                        <span class="fw-bold"
                                            style="color: white;"><?php echo ucfirst(explode(' ', $_SESSION['usuario']['nome'])[0]) ?></span>
                                    </div>
                                    <?php else : ?>

                                    <li class="nav-item-login">
                                        <a href="src/pages/login.php">Login</a>
                                    </li>
                                    <?php endif ?>

                                </ul>
                            </div>
                            <!-- navbar collapse -->
                        </nav>
                        <!-- navbar -->
                    </div>
                </div>
                <!-- row -->
            </div>
            <!-- container -->
        </div>
        <!-- navbar area -->
    </header>
    <!-- ======== header end ======== -->
    <!---->
    <section class="container mb-4" style="margin-top: 15%;">
        <div class="d-flex rounded">
            <!-- Sidebar -->
            <aside class="bg-primary text-white p-3 vh-100 d-flex flex-column rounded-start" style="width: 240px;">
                <div class="d-flex align-items-center mb-4">
                    <img src="../img/favicon/favicon.png" alt="Logo Aurora" width="30" class="me-2">
                    <span class="fw-bold fs-5">Aurora</span>
                </div>
                <nav class="nav flex-column">
                    <a class="nav-link text-white active bg-opacity-25 bg-white rounded mb-2" href="#">🏠 Inicial</a>
                    <a class="nav-link text-white bg-danger bg-opacity-25  rounded mb-2"
                        href="../database/logout.php">📤 Sair</a>
                    <!-- Add more nav links here -->
                </nav>
            </aside>

            <!-- Main Content -->
            <main class="flex-grow-1 bg-white p-4 rounded-end">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h1 class="fs-3 fw-semibold">Usuarios</h1>
                    <div class="d-flex">
                        <input class="form-control me-2" type="search" placeholder="Search the users">
                        <button class="btn btn-primary">Add</button>
                    </div>
                </div>
                <?php if($nivel == 1):?>
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>Nome</th>
                                <th>Email</th>
                                <th>Membro desde</th>
                                <th>Serviço</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($usuarios as $usuario):?>
                            <tr>
                                <td><img src="avatar1.png" class="rounded-circle me-2" width="32">
                                    <?= htmlspecialchars($usuario['nome'])?>
                                </td>
                                <td>
                                    <?= htmlspecialchars($usuario['email'])?>
                                </td>
                                <td>
                                    <?php  
                                    setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'portuguese');
                                    date_default_timezone_set('America/Sao_Paulo');
                                    $data = new DateTime($usuario['data_criacao']);
                                    echo strftime('%d de %B de %Y', $data->getTimestamp());
                                    ?>
                                </td>
                                <td><span class="badge bg-success"> <?= htmlspecialchars($usuario['nivel'])?></span>
                                </td>
                            </tr>
                            <?php endforeach?>
                        </tbody>
                    </table>
                </div>
                <?php endif;?>
            </main>
        </div>

    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous">
    </script>
</body>

</html>