<div class="row">
	<div class="col-sm-2"></div>
	<div class="col-sm-8">
		<br>
		<form method="POST" action="<?=BASE_URL.'home/enviar'; ?>">
			<label>Mensagem</label>
			<textarea name="mensagem" id="conteudo" class="form-control"></textarea>
			<br>
			<button class="btn btn-success">Enviar</button>
		</form>
		<?php if (!empty($_SESSION['error'])): ?>
			<br>
			<div class="alert alert-danger">
				<label>Mensagem não foi enviada!</label>
			</div>
		<?php unset($_SESSION['error']); endif; ?>
	</div> 
	<div class="col-sm-2"></div>
</div>