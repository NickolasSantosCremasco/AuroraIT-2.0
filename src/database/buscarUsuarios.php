<?php

$termo = isset($_GET['termo']) ? $_GET['termo'] : '';

$stmt = $pdo->prepare('SELECT id, nome, email, nivel, data_criacao FROM usuarios WHERE nome LIKE ? ORDER BY nome ASC');
$stmt->execute(["%%$termo%%"]);
$usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);

header('Content-Type: application/json');
echo json_encode($usuarios);

?>