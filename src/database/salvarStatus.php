<?php
// ...
require_once 'config.php';
require_once 'auth.php';

header('Content-Type: application/json');

if (!estaLogado() || $_SESSION['usuario']['nivel'] !== 1) {
    echo json_encode(['sucesso' => false, 'erro' => 'Acesso negado.']);
    exit;
}

$id_servico_raw = filter_input(INPUT_POST, 'id');
$novo_status_raw = filter_input(INPUT_POST, 'status');
$id_servico = filter_var($id_servico_raw, FILTER_VALIDATE_INT);
$novo_status = trim(htmlspecialchars($novo_status_raw, ENT_QUOTES, 'UTF-8'));

if ($id_servico === false || empty($novo_status)) {
    echo json_encode(['sucesso' => false, 'erro' => 'Dados inválidos.']);
    exit;
}

try {
    $stmt = $pdo->prepare('UPDATE servico SET status = :status WHERE id = :id');
    $stmt->execute([
        ':status' => $novo_status,
        ':id' => $id_servico
    ]);

    echo json_encode(['sucesso' => true]);

} catch (PDOException $e) {
    echo json_encode(['sucesso' => false, 'erro' => 'Erro no banco de dados: ' . $e->getMessage()]);
}
?>