<?php require 'views/topo.php'; ?>

<h4 class="mb-3"><?= $p ? 'Editar produto' : 'Novo produto' ?></h4>

<form method="post" class="row g-3">
	<div class="col-4 col-md-2">
		<label class="form-label">Código</label>
		<input type="text" name="codigo" class="form-control" value="<?= $p ? $p['codigo'] : '' ?>">
	</div>
	<div class="col-8 col-md-6">
		<label class="form-label">Nome</label>
		<input type="text" name="nome" class="form-control" value="<?= $p ? $p['nome'] : '' ?>">
	</div>
	<div class="col-12 col-md-4">
		<label class="form-label">Categoria</label>
		<input type="text" name="categoria" class="form-control" value="<?= $p ? $p['categoria'] : '' ?>">
	</div>
	<div class="col-6 col-md-3">
		<label class="form-label">Preço (R$)</label>
		<input type="number" step="0.01" name="preco" class="form-control" value="<?= $p ? $p['preco'] : '' ?>">
	</div>
	<div class="col-6 col-md-3">
		<label class="form-label">Estoque</label>
		<input type="number" name="estoque" class="form-control" value="<?= $p ? $p['estoque'] : '' ?>">
	</div>
	<div class="col-12">
		<button class="btn btn-primary btn-lg">Salvar</button>
		<a href="index.php?pagina=produtos" class="btn btn-link">Cancelar</a>
	</div>
</form>

<?php require 'views/rodape.php'; ?>