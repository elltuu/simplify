<?php
session_start();

require 'config/conexao.php';
require 'models/Usuario.php';
require 'models/Produto.php';
require 'models/Venda.php';
require 'controllers/LoginController.php';
require 'controllers/ProdutoController.php';
require 'controllers/VendaController.php';

$pagina = isset($_GET['pagina']) ? $_GET['pagina'] : 'inicio';

if (!isset($_SESSION['usuario_id']) && $pagina != 'login') {
	$pagina = 'login';
}

$login = new LoginController($pdo);
$produto = new ProdutoController($pdo);
$venda = new VendaController($pdo);

switch ($pagina) {
	case 'login':
		$login->entrar();
		break;
	case 'sair':
		$login->sair();
		break;
	case 'inicio':
		$venda->inicio();
		break;
	case 'produtos':
		$produto->listar();
		break;
	case 'produto_novo':
		$produto->novo();
		break;
	case 'produto_editar':
		$produto->editar();
		break;
	case 'nova_venda':
		$venda->nova();
		break;
	case 'confirmar_venda':
		$venda->confirmar();
		break;
	case 'vendas':
		$venda->historico();
		break;
	default:
		echo 'Pagina nao encontrada';
}
?>