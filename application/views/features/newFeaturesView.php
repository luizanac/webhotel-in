<br>
<div class="card-panel">
	<div class="row" >
		<form class="col s12" method="POST" id="feature_form" enctype="multipart/form-data" action="<?= base_url('nova-caracteristica'); ?>">
			<div class="row ">	
				<div class="input-field col s12 m12">
					<input type="text" id="name" name="name" autocomplete="off" required>	
					<label for="name">Nome da caracteristica</label>
				</div>
				<div class="input-field col s12 m12">
					<textarea id="description" name="description" class="materialize-textarea" style="resize:none;"></textarea>
					<label for="description">Descrição</label>
				</div>
				<div class="input-field col right">
					<button type="submit" class="btn blue darken-4">Salvar</button>
				</div>
			</div>
		</form>
	</div>
</div>