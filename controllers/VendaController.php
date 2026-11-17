<?php
class VendaController {
	private $venda;
	private $produto;

	public function __construct($pdo) {
		$this->venda = new Venda($pdo);
		$this->produto = new Produto($pdo);
	}

	public function inicio() {
		$resumo = $this->venda->resumoHoje();
		$alertas = $this->produto->estoqueBaixo();
		require 'views/inicio.php';
	}

	public function nova() {
		$busca = isset($_GET['busca']) ? $_GET['busca'] : '';
		$produtos = [];
		if ($busca != '') {
			$produtos = $this->produto->buscar($busca);
		}
		require 'views/nova_venda.php';
	}

	public function confirmar() {
		if ($_POST) {
			$p = $this->produto->buscarPorId($_POST['produto_id']);
			$total = $p['preco'] * $_POST['quantidade'];

			$id = $this->venda->salvar($p['id'], $_SESSION['usuario_id'], $_POST['quantidade'], $total);
			$this->produto->baixarEstoque($p['id'], $_POST['quantidade']);

			header('Location: index.php?pagina=confirmar_venda&id=' . $id);
			exit;
		}

		$v = $this->venda->buscarPorId($_GET['id']);
		require 'views/venda_ok.php';
	}

	public function historico() {
		$vendas = $this->venda->listar();
		require 'views/vendas.php';
	}
}
