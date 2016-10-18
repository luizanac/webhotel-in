<!DOCTYPE html>
<html>
<head>
	<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/materialize/css/materialize.min.css');?> ">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/materialize/css/style.css');?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<meta charset="utf-8">
	<title>Sistema Hotel</title>
</head>
<body class="grey lighten-4">
	<div class="row">
		<nav class="colorBlue ">
			<div class="nav-wrapper">
				<p  class="brand-logo" style="font-size: 20px; margin-top: -1px; margin-left: 15px;">Webcoop</p>
				<a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
				<ul class="right hide-on-med-and-down">
					<li><a href="#" class="dropdown-button" data-activates='dropdown3'><i class="material-icons right">keyboard_arrow_down</i>Reservas</a></li>
					<li><a href="#" class="dropdown-button" data-activates='dropdown1'><i class="material-icons right">keyboard_arrow_down</i>Unidades Habitacionais</a></li>
					<li><a href="#" class="dropdown-button" data-activates='dropdown2'><i class="material-icons right">keyboard_arrow_down</i>Bem-Vindo, <?php echo $user['name_user']; ?></a></li>
				</ul>
				<ul class="side-nav" id="mobile-demo">
					<li><a href="<?php echo base_url();  ?>">Reservas</a></li>
					<li><a href="#">Quartos</a></li>
					<li><a href="#">Sair</a></li>
				</ul>
			</div>
		</nav>
	</div>
	<div class="container col s12 m12 l8 offset-l2">
		<?= $contents ?>
	</div>

	<!-- Modal Loading -->
	<div id="loadingModal" class="modal center m6" style="margin-top:10%;">
		<h3>Aguarde</h3>
		<div class="progress">
        	<div class="indeterminate"></div>
      	</div>
      	<p>OBS:pode levar algum tempo dependendo da internet.</p>
	</div>

	<!-- Dropdowns do menu -->
	<ul id='dropdown1' class='dropdown-content' style="min-width: 160px; margin-top: 65px;">
		<li><a href="<?php echo base_url('tarifas'); ?>">Tarifas</a></li>
		<li><a href="<?php echo base_url('tipos-quartos'); ?>">Tipos de quarto</a></li>
		<li><a href="<?php echo base_url('caracteristicas'); ?>">Caracteristicas</a></li>
		<li><a href="<?php echo base_url('quartos'); ?>">Unidades Habtacionais</a></li>		
	</ul>
	<ul id='dropdown2' class='dropdown-content' style="max-width: 160px; margin-top: 65px;">
		<li><a href="<?php echo base_url(''); ?>">Configurações</a></li>
		<li><a href="<?php echo base_url('sair'); ?>">Sair</a></li>
	</ul>
	<ul id='dropdown3' class='dropdown-content' style="max-width: 160px; margin-top: 65px;">
		<li><a href="<?php echo base_url(''); ?>">Pendentes</a></li>
		<li><a href="<?php echo base_url(''); ?>">Finalizadas</a></li>
	</ul>
	<script type="text/javascript" src="<?= base_url('assets/materialize/js/jquery-2.2.2.js'); ?>"></script>
	<script type="text/javascript" src="<?= base_url('assets/materialize/js/materialize.js'); ?>"></script>
	<script type="text/javascript" src="<?= base_url('assets/materialize/js/main.js'); ?> "></script>
	<script type="text/javascript" src="<?= base_url('assets/materialize/js/jquery.validate.min.js') ?>">
	</script>
</body>
</html>