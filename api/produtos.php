<?php
session_start();
header('Content-Type: application/json; charset=utf-8');

if (!isset($_SESSION['usuario_id'])) {
	http_response_code(401);
	echo json_encode(['erro' => 'Faca login primeiro']);
	exit;
}

require '../config/conexao.php';
require '../models/Produto.php';

$produto = new Produto($pdo);
$busca = isset($_GET['busca']) ? $_GET['busca'] : '';

echo json_encode($produto->buscar($busca));
?>