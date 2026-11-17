<?php
class LoginController {
	private $usuario;

	public function __construct($pdo) {
		$this->usuario = new Usuario($pdo);
	}

	public function entrar() {
		$erro = '';

		if ($_POST) {
			$user = $this->usuario->buscarPorEmail($_POST['email']);

			if ($user && password_verify($_POST['senha'], $user['senha'])) {
				$_SESSION['usuario_id'] = $user['id'];
				$_SESSION['usuario_nome'] = $user['nome'];
				$_SESSION['perfil'] = $user['perfil'];
				header('Location: index.php');
				exit;
			}
			$erro = 'E-mail ou senha incorretos';
		}

		require 'views/login.php';
	}

	public function sair() {
		session_destroy();
		header('Location: index.php?pagina=login');
	}
}
?>