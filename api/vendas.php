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
require '../models/Venda.php';

$venda = new Venda($pdo);
$produto = new Produto($pdo);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$p = $produto->buscarPorId($_POST['produto_id']);
	$total = $p['preco'] * $_POST['quantidade'];

	$id = $venda->salvar($p['id'], $_SESSION['usuario_id'], $_POST['quantidade'], $total);
	$produto->baixarEstoque($p['id'], $_POST['quantidade']);

	echo json_encode($venda->buscarPorId($id));
} else {
	if ($_SESSION['perfil'] != 'gestor') {
		http_response_code(403);
		echo json_encode(['erro' => 'Apenas o gestor pode ver as vendas']);
		exit;
	}
	echo json_encode($venda->listar());
}
?>