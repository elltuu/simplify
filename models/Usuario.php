<?php
class Usuario {
	private $pdo;

	public function __construct($pdo) {
		$this->pdo = $pdo;
	}

	public function buscarPorEmail($email) {
		$sql = $this->pdo->prepare("SELECT * FROM usuarios WHERE email = ?");
		$sql->execute([$email]);
		return $sql->fetch(PDO::FETCH_ASSOC);
	}
}
?>