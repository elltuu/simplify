<?php require 'views/topo.php'; ?>

<h4 class="mb-3">Acesso rápido</h4>

<div class="row g-3 mb-4">
	<div class="col-12 col-md-4">
		<a href="index.php?pagina=nova_venda" class="btn btn-success btn-lg w-100 py-4">Nova venda</a>
	</div>
	<div class="col-6 col-md-4">
		<a href="index.php?pagina=produtos" class="btn btn-outline-primary btn-lg w-100 py-4">Consultar produto</a>
	</div>
	<div class="col-6 col-md-4">
		<?php if ($_SESSION['perfil'] == 'gestor') { ?>
			<a href="index.php?pagina=vendas" class="btn btn-outline-primary btn-lg w-100 py-4">Histórico de vendas</a>
		<?php } else { ?>
			<a href="index.php?pagina=produto_novo" class="btn btn-outline-primary btn-lg w-100 py-4">Cadastrar produto</a>
		<?php } ?>
	</div>
</div>

<div class="row g-3">
	<div class="col-6">
		<div class="card text-center">
			<div class="card-body">
				<small class="text-muted">Vendas hoje</small>
				<h3><?= $resumo['qtd'] ?></h3>
			</div>
		</div>
	</div>
	<div class="col-6">
		<div class="card text-center">
			<div class="card-body">
				<small class="text-muted">Total hoje</small>
				<h3>R$ <?= number_format($resumo['total'], 2, ',', '.') ?></h3>
			</div>
		</div>
	</div>
</div>

<h5 class="mt-4">Alertas de estoque baixo</h5>
<?php if (count($alertas) == 0) { ?>
	<p class="text-muted">Nenhum produto com estoque baixo.</p>
<?php } ?>
<?php foreach ($alertas as $a) { ?>
	<div class="alert alert-warning py-2">
		<strong><?= $a['nome'] ?></strong> - restam <?= $a['estoque'] ?> unidades
	</div>
<?php } ?>

<?php require 'views/rodape.php'; ?>