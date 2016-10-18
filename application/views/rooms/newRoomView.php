<br>
<div class="card-panel">
	<div class="row">
		<?php if($kinds != false){ ?>
			<form class="col s12" method="POST" id="room_form" enctype="multipart/form-data">
				<div class="row">
					<div class="input-field col s12 m6 l6">
						<input class="black-text" type="number" id="number" name="number_room">
						<label for="number">Numero do quarto</label>
					</div>
					<div class="input-field col s12 m6 l6">
						<select id="kind" name="kind">
							<option selected disabled>Selecione</option>
							<?php foreach ($kinds as $kind) : ?>
							<option value="<?= $kind['id_room_kind']; ?>"><?= $kind['name_room_kind']; ?></option>
						<?php endforeach ?>
					</select>
					<label for="kind">Tipo do quarto</label>
				</div>
			</div>
			<div class="row">
				<div class="input-field col s12 m4 l4">
					<select id="single_bed" name="single_bed_room">
						<option selected disabled>Selecione</option>
						<option value="0">0</option>
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
					</select>
					<label for="single_bed">Camas solteiro</label>
				</div>
				<div class="input-field col s12 m4 l4">
					<select id="double_bed" name="double_bed_room">
						<option selected disabled>Selecione</option>
						<option value="0">0</option>
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
					</select>
					<label for="double_bed">Camas casal</label>
				</div>
				<div class="input-field col s12 m4 l4">
					<select id="bunk_bed" name="bunk_bed_room">
						<option selected disabled>Selecione</option>
						<option value="0">0</option>
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
					</select>
					<label for="bunk_bed">Beliches</label>
				</div>
			</div>
			<div class="row">
				<div class="input-field col s12">
					<textarea class="black-text materialize-textarea" name="description_room" id="description" style="resize:none;"></textarea>
					<label for="description">Descrição do quarto</label>
				</div> 
			</div>
			<!-- Modal de upload de imagens -->
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
		</div>
		<div class="col s12 m4 l2">
			<a class="btn blue darken-4 modal-trigger" id="modal_images_open" href="#modal_images">Imagens</a>
			<button type="submit" class="btn blue darken-4 right">Salvar</button>
		</div>
	</form>
	<?php }else{ ?>
		<br>
		<p class="center">Você não tem nenhum <a href="<?php echo base_url('tipos-quartos'); ?>" >tipo de quarto </a>cadastrado.</p>
		<?php } ?>
	</div>
</div>