<br>
<div class="card-panel">
	<div class="row">
		<div class="col s12">
			<div class="row">
				<form method="POST" action="" id="update_tariff_form">
					<div class="input-field col s12">
						<input type="text" id="name_tariff" name="tariff[name_tariff]" value="<?= $tariff[0]['name_tariff'];?>" required autocomplete="off">
						<label for="name_tariff">Nome da tarifa</label>
					</div>
					<div class="input-field col s12 m4">
						<input type="number" id="basePrice" name="tariff[base_price]" value="<?= $tariff[0]['base_price']; ?>" required autocomplete="off">
						<label for="base_price">Preço base</label>
					</div>
					<div class="input-field col s12 m4">
						<input type="number" id="adult_price" name="tariff[adult_price]" value="<?= $tariff[0]['adult_price']; ?>" required autocomplete="off">
						<label id="adult_price">Preço por adulto</label>
					</div>
					<div class="input-field col s12 m4">
						<input type="number" id="children_price" name="tariff[children_price]" value="<?= $tariff[0]['children_price']; ?>" required autocomplete="off">
						<label id="children_price">Preço por criança</label>
					</div>
					<div class="col s12 m6">
						<label>Data inicial</label>
						<input type="date" id="start_date" name="tariff[start_date]" value="<?= $tariff[0]['start_date'] ?>">
					</div>
					<div class="col s12 m6">	
						<label>Data final</label>				
						<input type="date" id="final_date" name="tariff[final_date]" value="<?= $tariff[0]['final_date']; ?>">
					</div>
					<div class="col right">
						<button type="submit" class="loading btn blue darken-4">Salvar</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
