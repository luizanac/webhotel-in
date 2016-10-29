<script type="text/javascript">
	$(document).ready(function(){
		
	});
</script>
<style type="text/css">
	.detalhe{
		border-top: 1px solid #babbbc;
		background-color: #eaebed;
		width: 100%;
		height: 100%;
		-webkit-box-shadow: 0px -4px 13px 2px rgba(0,0,0,0.75);
		-moz-box-shadow: 0px -4px 13px 2px rgba(0,0,0,0.75);
		box-shadow: 0px -4px 13px 2px rgba(0,0,0,0.75);
		overflow-y: auto;
		overflow-x: hidden;
	}
	i{
		position: absolute;
		right: 0;
		top: 25px;
	}
</style>
<i class="glyphicon glyphicon-remove-circle close"></i>
<div class="detalhe">
	<div class="content">
		<div>
			<article class="col-sm-12">
				<div class="col-sm-5">
					<?php
					foreach ($a as $key => $b): ?>
					<h3>Quarto: <?= $b["number_room"]; ?></h3>
					<p><?= $b["description_room"]; ?></p>
					<?php
					endforeach;
					?>
				</div>
				<div class="col-sm-6">
					<ul class="rslides">
						<?php
						foreach ($c as $key => $d): ?>
						<li><img class="img-responsive" src="<?= base_url('assets/img/uploads/').$d['kind_image_route']; ?>"/></li>
						<?php
						endforeach;
						?>
					</ul>
				</div>
				<div class="col-sm-1">
					<button type="button" data-role="none" class="slick-prev slick-arrow" aria-label="Previous" role="button" style="">Avançar</button>
				</div>
			</article>
		</div>
		<div>

			<article class="container">
				<div class="col-sm-6">
					<h3>Preencha com seus dados</h3>
					<form id="check_client">
						<div class="form-group">
							<label for="client_name">Nome *</label>
							<br>
							<input type="text" required="true" class="form-control" name="client_name">
						</div>
						<div class="form-group">
							<label for="client_mail">E-mail *</label>
							<br>
							<input type="mail" required="true" class="form-control" name="client_mail">
						</div>
						<div class="form-group">
							<label for="client_cpf">CPF *</label>
							<br>
							<input type="mail" pattern="[0-9]{3}.[0-9]{3}.[0-9]{3}-[0-9]{2}$" required="true" class="form-control" name="client_cpf">
						</div>							
						<div class="form-group">
							<label for="client_phone">Telefone *</label>
							<br>
							<input type="tel" class="form-control" required="required" maxlength="15" name="phone" pattern="\([0-9]{2}\) [0-9]{4,6}-[0-9]{3,4}$" / name="client_phone">
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-primary">Avançar</button>
						</div>
					</form>
				</div>
				<div class="col-sm-6">
					<h3>Número de hospedes</h3>
					<form>
						<div class="form-group">
							<label for="client_name">Número de adultos *</label>
							<br>
							<input type="number" required="true" class="form-control" name="client_name">
						</div>
						<div class="form-group">
							<label for="client_name">Número de crianças *</label>
							<br>
							<input type="number" required="true" class="form-control" name="client_name">
						</div>
					</form>
				</div>
			</article>
		</div>
		<div>
			<article class="container">
				<div class="col-sm-6">
					<h3>Preencha os dados para o pagamento</h3>
					<form id="check_client">
						<div class="form-group">
							<label for="client_name">Número do cartão *</label>
							<br>
							<input type="text" required="true" class="form-control" name="client_name">
						</div>
						<div class="form-group">
							<label for="client_mail">Nome do titular do cartão *</label>
							<br>
							<input type="mail" required="true" class="form-control" name="client_mail">
						</div>
						<div class="form-group">
							<label for="client_cpf">Validade do cartão *</label>
							<br>
							<input type="mail" pattern="[0-9]{3}.[0-9]{3}.[0-9]{3}-[0-9]{2}$" required="true" class="form-control" name="client_cpf">
						</div>							
						<div class="form-group">
							<label for="client_phone">Telefone *</label>
							<br>
							<input type="tel" class="form-control" required="required" maxlength="15" name="phone" pattern="\([0-9]{2}\) [0-9]{4,6}-[0-9]{3,4}$" / name="client_phone">
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-primary">Avançar</button>
						</div>
					</form>
				</div>
			</article>
		</div>
	</div>
</div>