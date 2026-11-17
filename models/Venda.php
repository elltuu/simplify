<?php
class Venda {
	private $pdo;

	public function __construct($pdo) {
		$this->pdo = $pdo;
	}

	public function salvar($produto_id, $usuario_id, $quantidade, $valor_total) {
		$sql = $this->pdo->prepare("INSERT INTO vendas (produto_id, usuario_id, quantidade, valor_total) VALUES (?, ?, ?, ?)");
		$sql->execute([$produto_id, $usuario_id, $quantidade, $valor_total]);
		return $this->pdo->lastInsertId();
	}

	public function buscarPorId($id) {
		$sql = $this->pdo->prepare("SELECT v.*, p.nome AS produto, p.preco, u.nome AS vendedor
			FROM vendas v
			JOIN produtos p ON p.id = v.produto_id
			JOIN usuarios u ON u.id = v.usuario_id
			WHERE v.id = ?");
		$sql->execute([$id]);
		return $sql->fetch(PDO::FETCH_ASSOC);
	}

	public function listar() {
		return $this->pdo->query("SELECT v.*, p.nome AS produto, u.nome AS vendedor
			FROM vendas v
			JOIN produtos p ON p.id = v.produto_id
			JOIN usuarios u ON u.id = v.usuario_id
			ORDER BY v.data_venda DESC")->fetchAll(PDO::FETCH_ASSOC);
	}

	public function resumoHoje() {
		return $this->pdo->query("SELECT COUNT(*) AS qtd, IFNULL(SUM(valor_total), 0) AS total
			FROM vendas WHERE DATE(data_venda) = CURDATE()")->fetch(PDO::FETCH_ASSOC);
	}
}
?>