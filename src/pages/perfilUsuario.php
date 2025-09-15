<?php
require_once '../database/auth.php';
require_once '../database/config.php';

if (!estaLogado()) {
    header('Location: login.php');
    exit;
}

$usuario_id = $_SESSION['usuario']['id'];

$stmtMeusServicos = $pdo->prepare('SELECT s.*, ts.nome_tipo, ts.valor FROM servico s JOIN tipos_servico ts ON s.tipo_servico_id = ts.id WHERE s.usuario_id = :usuario_id');
$stmtMeusServicos->execute([
    ':usuario_id' => $usuario_id
]);

$stmtTotalServicos = $pdo->prepare('SELECT COUNT(*) FROM servico WHERE usuario_id = :usuario_id ');
$stmtTotalServicos->execute([
    ':usuario_id' => $usuario_id
]);

$stmtTotalServicosEmAndamento = $pdo->prepare('SELECT COUNT(*) FROM servico WHERE status = :status AND usuario_id = :usuario_id');
$stmtTotalServicosEmAndamento->execute([
    ':status' => 'Em Andamento',
    ':usuario_id' => $usuario_id
]);

$stmtTotalServicosConcluidos = $pdo->prepare('SELECT COUNT(*) FROM servico WHERE status = :status AND usuario_id = :usuario_id');
$stmtTotalServicosConcluidos->execute([
    ':status' => 'Concluido',
    ':usuario_id' => $usuario_id
]);

$stmtTotalGastoEmServicos = $pdo->prepare('SELECT SUM(ts.valor) AS total_gasto FROM servico s JOIN tipos_servico ts ON s.tipo_servico_id = ts.id WHERE  s.usuario_id = :usuario_id');
$stmtTotalGastoEmServicos->execute([
    ':usuario_id' => $usuario_id
]);

$stmtComentarios = $pdo->prepare('SELECT c.*, u.nome AS nome_autor FROM comentarios c JOIN servico s ON c.servico_id = s.id JOIN usuarios u ON c.usuario_id = u.id WHERE s.usuario_id = :usuario_id ORDER BY c.data_criacao DESC');

$stmtComentarios->execute([
    ':usuario_id' => $usuario_id
]);

$meusServicos = $stmtMeusServicos->fetchAll(PDO::FETCH_ASSOC);
$totalServicos = $stmtTotalServicos->fetchColumn();
$TotalServicosEmAndamento = $stmtTotalServicosEmAndamento->fetchColumn();
$TotalServicosConcluidos = $stmtTotalServicosConcluidos->fetchColumn();
$TotalGasto = $stmtTotalGastoEmServicos->fetchColumn();
$comentariosDoServico = $stmtComentarios->fetchAll(PDO::FETCH_ASSOC);

$TotalGastoFormatado = number_format($TotalGasto, 2 , ',', '.');

$dataCriacao = new DateTime($_SESSION['usuario']['data_criacao']);

$meses = array(
    'January' => 'janeiro',
    'February' => 'fevereiro',
    'March' => 'março',
    'April' => 'abril',
    'May' => 'maio',
    'June' => 'junho',
    'July' => 'julho',
    'August' => 'agosto',
    'September' => 'setembro',
    'October' => 'outubro',
    'November' => 'novembro',
    'December' => 'dezembro'
);

$mes = $dataCriacao->format('F');
$mes_pt = $meses[$mes];

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil do Usuário - Aurora IT</title>
    <link rel="stylesheet" href="../css/perfilUsuario.css">
    <link rel="shortcut icon" href="../img/favicon/favicon.png" type="image/x-icon">
</head>

<body>
    <div class="floating-elements">
        <div class="floating-element" style="left: 10%; width: 60px; height: 60px; animation-delay: -2s;"></div>
        <div class="floating-element" style="left: 70%; width: 80px; height: 80px; animation-delay: -8s;"></div>
        <div class="floating-element" style="left: 40%; width: 40px; height: 40px; animation-delay: -15s;"></div>
    </div>

    <div class="container">
        <div class="header">
            <div class="profile-section">
                <div class="profile-avatar"> <?= htmlspecialchars(substr($_SESSION['usuario']['nome'], 0, 2)) ?></div>
                <div class="profile-info">
                    <h1><?= htmlspecialchars($_SESSION['usuario']['nome'])?></h1>
                    <p><?= htmlspecialchars($_SESSION['usuario']['email'])?></p>
                    <p><?= htmlspecialchars($_SESSION['usuario']['numero'])?></p>
                    <p> Membro desde:
                        <?= 
                            $dataCriacao->format('d \d\e ') . $mes_pt . $dataCriacao->format(' \d\e Y')
                        ?>
                    </p>
                    <a class="btn-sair" href="../database/logout.php">
                        <i class="fas fa-sign-out-alt me-2"></i> Sair da Conta
                    </a>
                </div>

            </div>

            <div class="profile-stats">
                <div class="stat-card">
                    <span class="stat-number"><?= $totalServicos ?></span>
                    <span class="stat-label">Projetos Totais</span>
                </div>
                <div class="stat-card">
                    <span class="stat-number">
                        <?=$TotalServicosEmAndamento?>
                    </span>
                    <span class="stat-label">Em Andamento</span>
                </div>
                <div class="stat-card">
                    <span class="stat-number"><?= $TotalServicosConcluidos?></span>
                    <span class="stat-label">Concluídos</span>
                </div>
                <div class="stat-card">
                    <span class="stat-number">R$
                        <?=$TotalGastoFormatado?>
                    </span>
                    <span class="stat-label">Investimento Total</span>
                </div>
            </div>
        </div>

        <div class="main-content">
            <div class="services-section">
                <h2 class="section-title">Meus Serviços</h2>

                <div class="services-grid">
                    <?php foreach ($meusServicos as $servico):?>
                    <div class="service-card">
                        <div class="service-header">
                            <div class="service-title">
                                <div class="service-icon">🚀</div>
                                <span><?= $servico['nome_tipo']?></span>
                            </div>

                            <?php if($servico['status'] === 'Em Andamento'):?>
                            <span class="status-badge status-in-progress">
                                <?= $servico['status']?>
                            </span>
                            <?php elseif($servico['status'] ==='Concluido'):?>
                            <span class="status-badge status-completed">
                                <?= $servico['status']?>
                            </span>
                            <?php endif?>


                        </div>
                        <div class="service-details">
                            <?php foreach ($comentariosDoServico as $comentario):?>

                            <?php if ($comentario['servico_id']===$servico['id']): ?>
                            <div class="comentario">

                                <p><?= nl2br(htmlspecialchars($comentario['titulo_comentario'])) ?></p>
                                <p><?= nl2br(htmlspecialchars($comentario['comentario'])) ?></p>
                                <small>Criado em: <?= htmlspecialchars($comentario['data_criacao']) ?></small>
                            </div>
                            <hr>
                            <?php endif;?>
                            <?php endforeach;?>
                        </div>
                        <div class="service-progress">
                            <div class="progress-label">
                                <span>Progresso: 75%</span>
                                <span>Entrega: <?= $servico['data_termino']?></span>

                                <?php foreach ($comentariosDoServico as $comentario):?>
                                <strong>Comentário feito por:
                                    <?= htmlspecialchars($comentario['nome_autor']) ?></strong>

                                <?php if ($comentario['servico_id']===$servico['id']): ?>
                                <?php endif;?>
                                <?php endforeach;?>
                            </div>
                            <div class="progress-bar">
                                <div class="progress-fill" style="width: 75%"></div>
                            </div>
                        </div>
                        <div class="service-actions">
                            <button class="btn btn-primary">📋 Ver Detalhes</button>

                        </div>
                    </div>
                    <?php endforeach?>

                </div>
            </div>

            <div class="sidebar">
                <div class="sidebar-card">
                    <h3 class="section-title">Ações Rápidas</h3>
                    <div class="quick-actions">
                        <a href="#" class="action-btn">
                            <span>➕</span> Novo Projeto
                        </a>

                        <a href="#" class="action-btn"
                            style="background: linear-gradient(135deg, #fa709a 0%, #fee140 100%);">
                            <span>📊</span> Importar CSV
                        </a>
                    </div>
                </div>

                <div class="sidebar-card">
                    <h3 class="section-title">Atividades Recentes</h3>
                    <div class="recent-activity">
                        <div class="activity-item">
                            <div class="activity-icon">✅</div>
                            <div class="activity-content">
                                <div class="activity-title">Projeto aprovado</div>
                                <div class="activity-time">Há 2 horas</div>
                            </div>
                        </div>
                        <div class="activity-item">
                            <div class="activity-icon">💬</div>
                            <div class="activity-content">
                                <div class="activity-title">Nova mensagem no chat</div>
                                <div class="activity-time">Há 5 horas</div>
                            </div>
                        </div>
                        <div class="activity-item">
                            <div class="activity-icon">📊</div>
                            <div class="activity-content">
                                <div class="activity-title">Relatório de progresso enviado</div>
                                <div class="activity-time">Ontem</div>
                            </div>
                        </div>
                        <div class="activity-item">
                            <div class="activity-icon">🚀</div>
                            <div class="activity-content">
                                <div class="activity-title">Site publicado com sucesso</div>
                                <div class="activity-time">2 dias atrás</div>
                            </div>
                        </div>
                        <div class="activity-item">
                            <div class="activity-icon">⭐</div>
                            <div class="activity-content">
                                <div class="activity-title">Avaliação de 5 estrelas recebida</div>
                                <div class="activity-time">3 dias atrás</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="../js/perfilUsuario.js">
    </script>
</body>

</html>