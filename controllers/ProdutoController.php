<?php
class ProdutoController {
	private $produto;

	public function __construct($pdo) {
		$this->produto = new Produto($pdo);
	}

	public function listar() {
		$busca = isset($_GET['busca']) ? $_GET['busca'] : '';
		$produtos = $this->produto->buscar($busca);
		require 'views/produtos.php';
	}

	public function novo() {
		if ($_POST) {
			$this->produto->salvar($_POST);
			header('Location: index.php?pagina=produtos');
			exit;
		}
		$p = null;
		require 'views/produto_form.php';
	}

	public function editar() {
		if ($_POST) {
			$this->produto->atualizar($_GET['id'], $_POST);
			header('Location: index.php?pagina=produtos');
			exit;
		}
		$p = $this->produto->buscarPorId($_GET['id']);
		require 'views/produto_form.php';
	}
}
?>