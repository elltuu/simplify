<?php require 'views/topo.php'; ?>

<div class="d-flex justify-content-between align-items-center mb-3">
	<h4 class="mb-0">Produtos</h4>
	<a href="index.php?pagina=produto_novo" class="btn btn-primary">+ Novo</a>
</div>

<form method="get" class="mb-3">
	<input type="hidden" name="pagina" value="produtos">
	<div class="input-group">
		<input type="text" name="busca" class="form-control" placeholder="Buscar por nome, código ou categoria" value="<?= $busca ?>">
		<button class="btn btn-outline-primary">Buscar</button>
	</div>
</form>

<div class="table-responsive">
	<table class="table table-hover align-middle">
		<thead class="table-light">
			<tr>
				<th>Código</th>
				<th>Nome</th>
				<th class="d-none d-md-table-cell">Categoria</th>
				<th>Preço</th>
				<th>Estoque</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($produtos as $p) { ?>
				<tr>
					<td><?= $p['codigo'] ?></td>
					<td><?= $p['nome'] ?></td>
					<td class="d-none d-md-table-cell"><?= $p['categoria'] ?></td>
					<td>R$ <?= number_format($p['preco'], 2, ',', '.') ?></td>
					<td>
						<?php if ($p['estoque'] <= 5) { ?>
							<span class="badge bg-warning text-dark"><?= $p['estoque'] ?></span>
						<?php } else { ?>
							<?= $p['estoque'] ?>
						<?php } ?>
					</td>
					<td><a href="index.php?pagina=produto_editar&id=<?= $p['id'] ?>" class="btn btn-sm btn-outline-secondary">Editar</a></td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
</div>

<?php require 'views/rodape.php'; ?>