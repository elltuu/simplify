<?php require 'views/topo.php'; ?>

<script>
function mostrarSenha() {
	var campo = document.getElementById('senha');
	if (campo.type == 'password') {
		campo.type = 'text';
	} else {
		campo.type = 'password';
	}
}
</script>

<div class="row justify-content-center mt-5">
	<div class="col-12 col-md-5">
		<h2 class="text-center text-primary mb-1">Simplify</h2>
		<p class="text-center text-muted">Dados e Gestão</p>

		<div class="card shadow-sm">
			<div class="card-body">
				<?php if ($erro) { ?>
					<div class="alert alert-danger"><?= $erro ?></div>
				<?php } ?>

				<form method="post">
					<div class="mb-3">
						<label class="form-label">E-mail</label>
						<input type="email" name="email" class="form-control form-control-lg">
					</div>
					<div class="mb-3">
						<label class="form-label">Senha</label>
						<input type="password" name="senha" id="senha" class="form-control form-control-lg">
					</div>
					<div class="form-check mb-3">
						<input type="checkbox" class="form-check-input" id="mostrar" onclick="mostrarSenha()">
						<label class="form-check-label" for="mostrar">Mostrar senha</label>
					</div>
					<button class="btn btn-primary btn-lg w-100">Entrar</button>
				</form>
			</div>
		</div>
	</div>
</div>

<?php require 'views/rodape.php'; ?>