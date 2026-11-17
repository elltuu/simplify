<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Simplify - Dados e Gestão</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
	<link href="public/css/estilo.css" rel="stylesheet">
</head>
<body>

<?php if (isset($_SESSION['usuario_id'])) { ?>
<nav class="navbar navbar-expand-md navbar-dark bg-primary mb-3">
	<div class="container">
		<a class="navbar-brand" href="index.php">Simplify</a>
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="menu">
			<ul class="navbar-nav me-auto">
				<li class="nav-item"><a class="nav-link" href="index.php">Início</a></li>
				<li class="nav-item"><a class="nav-link" href="index.php?pagina=nova_venda">Nova venda</a></li>
				<li class="nav-item"><a class="nav-link" href="index.php?pagina=produtos">Produtos</a></li>
				<?php if ($_SESSION['perfil'] == 'gestor') { ?>
					<li class="nav-item"><a class="nav-link" href="index.php?pagina=vendas">Vendas</a></li>
				<?php } ?>
			</ul>
			<span class="navbar-text me-3">Olá, <?= $_SESSION['usuario_nome'] ?></span>
			<a href="index.php?pagina=sair" class="btn btn-outline-light btn-sm">Sair</a>
		</div>
	</div>
</nav>
<?php } ?>

<div class="container">