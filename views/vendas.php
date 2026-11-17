<?php require 'views/topo.php'; ?>

<h4 class="mb-3">Histórico de vendas</h4>

<div class="table-responsive">
	<table class="table table-striped table-hover">
		<thead class="table-primary">
			<tr>
				<th>Nº</th>
				<th>Data</th>
				<th>Produto</th>
				<th>Qtd</th>
				<th>Total</th>
				<th>Vendedor</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($vendas as $v) { ?>
				<tr>
					<td><?= $v['id'] ?></td>
					<td><?= date('d/m/Y H:i', strtotime($v['data_venda'])) ?></td>
					<td><?= $v['produto'] ?></td>
					<td><?= $v['quantidade'] ?></td>
					<td>R$ <?= number_format($v['valor_total'], 2, ',', '.') ?></td>
					<td><?= $v['vendedor'] ?></td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
</div>

<?php if (count($vendas) == 0) { ?>
	<p class="text-muted">Nenhuma venda registrada ainda.</p>
<?php } ?>

<?php require 'views/rodape.php'; ?>