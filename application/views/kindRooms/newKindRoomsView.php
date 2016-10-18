<br>
<div class="card-panel">
	<div class="row">
		<div class="col s12">
			<form method="POST" id="kind_form" action="">
				<div class="row col s12">
					<div class="col input-field s12">
						<input type="text" id="nameKind" name="nameKind" autocomplete="off" required>
						<label for="nameKind">Nome do tipo</label>
					</div>
					<!-- Modal de seleção de caracteristicas -->
					<div id="modal_features" class="modal modal-fixed-footer">
						<div class="modal-content">
							<?php foreach($features as $feature) : ?>
								<div class="col s4">
									<p>
										<input type="checkbox" name="features[]" id="<?= $feature['name_feature'];?>" value="<?= $feature['id_feature']; ?>" />
										<label for="<?= $feature['name_feature'];?>"><?= $feature['name_feature'];?></label>
									</p>
								</div>
							<?php endforeach ?>	
						</div>
						<div class="modal-footer">
							<a href="#!" class=" modal-action modal-close btn right blue darken-4">Pronto</a>
						</div>
					</div>
					<div id="modal_images" class="modal">
						<div class="modal-content">
							<div class="file-field input-field">
								<div class="btn blue darken-4">
									<span>Imagem</span>
									<input type="file" name="userfiles[]" multiple autocomplete="off" accept="image/*;capture=camera">
								</div>
								<div class="file-path-wrapper">
									<input class="file-path validate" type="text">
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<a href="#!" class=" modal-action modal-close btn right blue darken-4">Pronto</a>
						</div>
					</div>
					<div class="col s12 m4 l2 left" style="margin-lef:5px;">
						<a class="btn blue darken-4 modal-trigger" id="modal_images_open" href="#modal_images">Imagens</a>
					</div>
					<div class="col s12 m4 l2 left">
						<a class="btn blue darken-4 modal-trigger" id="modal_features_open" href="#modal_features">caracteristicas</a>
					</div>
					<div class="col right">
						<button type="submit" class="loading btn blue darken-4">Salvar</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
