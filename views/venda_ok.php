<?php require 'views/topo.php'; ?>

<div class="alert alert-success text-center">
	<h4 class="mb-0">Venda registrada com sucesso!</h4>
</div>

<div class="card mb-3">
	<div class="card-header">Resumo da venda nº <?= $v['id'] ?></div>
	<ul class="list-group list-group-flush">
		<li class="list-group-item">Produto: <strong><?= $v['produto'] ?></strong></li>
		<li class="list-group-item">Quantidade: <?= $v['quantidade'] ?></li>
		<li class="list-group-item">Preço unitário: R$ <?= number_format($v['preco'], 2, ',', '.') ?></li>
		<li class="list-group-item">Total: <strong>R$ <?= number_format($v['valor_total'], 2, ',', '.') ?></strong></li>
		<li class="list-group-item">Vendedor: <?= $v['vendedor'] ?></li>
		<li class="list-group-item">Data: <?= date('d/m/Y H:i', strtotime($v['data_venda'])) ?></li>
	</ul>
</div>

<div class="d-grid gap-2">
	<a href="index.php?pagina=nova_venda" class="btn btn-success btn-lg">Nova venda</a>
	<a href="index.php" class="btn btn-outline-secondary">Voltar ao início</a>
</div>

<?php require 'views/rodape.php'; ?>