<?php require 'views/topo.php'; ?>

<h4>Nova venda</h4>
<p class="text-muted">Pesquise o produto pelo nome, código ou categoria.</p>

<form method="get" class="mb-3">
	<input type="hidden" name="pagina" value="nova_venda">
	<div class="input-group input-group-lg">
		<input type="text" name="busca" class="form-control" placeholder="Ex: camiseta ou 001" value="<?= $busca ?>">
		<button class="btn btn-primary">Buscar</button>
	</div>
</form>

<?php if ($busca != '' && count($produtos) == 0) { ?>
	<div class="alert alert-secondary">Nenhum produto encontrado.</div>
<?php } ?>

<?php foreach ($produtos as $p) { ?>
	<div class="card mb-3">
		<div class="card-body">
			<div class="d-flex justify-content-between">
				<h5 class="mb-0"><?= $p['nome'] ?></h5>
				<span class="badge bg-secondary align-self-start"><?= $p['codigo'] ?></span>
			</div>
			<small class="text-muted"><?= $p['categoria'] ?></small>

			<div class="d-flex justify-content-between align-items-center my-2">
				<span class="preco">R$ <?= number_format($p['preco'], 2, ',', '.') ?></span>
				<?php if ($p['estoque'] > 0) { ?>
					<span class="text-success">Em estoque: <?= $p['estoque'] ?></span>
				<?php } else { ?>
					<span class="text-danger">Sem estoque</span>
				<?php } ?>
			</div>

			<?php if ($p['estoque'] > 0) { ?>
				<form method="post" action="index.php?pagina=confirmar_venda" class="d-flex gap-2">
					<input type="hidden" name="produto_id" value="<?= $p['id'] ?>">
					<input type="number" name="quantidade" value="1" class="form-control form-control-lg" style="max-width: 100px;">
					<button class="btn btn-success btn-lg flex-fill">Confirmar venda</button>
				</form>
			<?php } ?>
		</div>
	</div>
<?php } ?>

<?php require 'views/rodape.php'; ?>