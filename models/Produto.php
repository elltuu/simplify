<?php
class Produto {
	private $pdo;

	public function __construct($pdo){
		$this->pdo = $pdo;
	}

	public function buscar($termo) {
		$sql = $this->pdo->prepare("SELECT * FROM produtos WHERE nome LIKE ? OR codigo LIKE ? OR categoria LIKE ? ORDER BY nome");
		$sql->execute(["%$termo%", "%$termo%", "%$termo%"]);
		return $sql->fetchAll(PDO::FETCH_ASSOC);
	}

	public function buscarPorId($id) {
		$sql = $this->pdo->prepare("SELECT * FROM produtos WHERE id = ?");
		$sql->execute([$id]);
		return $sql->fetch(PDO::FETCH_ASSOC);
	}

	public function estoqueBaixo() {
		return $this->pdo->query("SELECT * FROM produtos WHERE estoque <= 5 ORDER BY estoque")->fetchAll(PDO::FETCH_ASSOC);
	}

	public function salvar($dados) {
		$sql = $this->pdo->prepare("INSERT INTO produtos (codigo, nome, categoria, preco, estoque) VALUES (?, ?, ?, ?, ?)");
		$sql->execute([$dados['codigo'], $dados['nome'], $dados['categoria'], $dados['preco'], $dados['estoque']]);
	}

	public function atualizar($id, $dados) {
		$sql = $this->pdo->prepare("UPDATE produtos SET codigo = ?, nome = ?, categoria = ?, preco = ?, estoque = ? WHERE id = ?");
		$sql->execute([$dados['codigo'], $dados['nome'], $dados['categoria'], $dados['preco'], $dados['estoque'], $id]);
	}

	public function baixarEstoque($id, $quantidade) {
		$sql = $this->pdo->prepare("UPDATE produtos SET estoque = estoque - ? WHERE id = ?");
		$sql->execute([$quantidade, $id]);
	}
}
?>