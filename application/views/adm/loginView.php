<!DOCTYPE html>
<html>
<head>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/materialize/css/materialize.min.css');?> ">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/materialize/css/style.css');?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<meta charset="utf-8">
	<title>Sistema Hotel - Login</title>
	<?php 
	$horaManha = strtotime("06:00:00");
	$horaMeio  = strtotime("12:00:00");
	$horaTarde = strtotime("18:00:00");
	$horaAtual = strtotime("now");
	?>
</head>
<body class="grey lighten-4 <?php if($horaAtual < $horaManha || $horaAtual > $horaTarde){ 
	echo "noite"; 
}else if($horaAtual < $horaTarde && $horaAtual > $horaMeio){
	echo "tarde";
}else{
	echo "manha";
} ?> ">
<br>
<div class="container">
	<div class="row card-panel">
		<form method="POST" action="" id="login_form"> 
			<div class="input-field col s12 m6 l6">
				<input type="text" id="login" name="login" autocomplete="off" required>
				<label for="login">Login</label>
			</div>
			<div class="input-field col s12 m6 l6">
				<input type="password" id="pass" name="pass" autocomplete="off" required>
				<label for="pass">Senha</label>
			</div>
			<div class="col right">
				<button type="submit" class="loading btn btn-green darken-4">Entrar</button>
			</div>
		</form>
	</div>
</div>

<!-- Modal Loading -->
<div id="loadingModal" class="modal center m6" style="margin-top:10%;">
	<h3>Aguarde</h3>
	<div class="progress">
		<div class="indeterminate"></div>
	</div>
</div>

<script type="text/javascript" src="<?= base_url('assets/materialize/js/jquery-2.2.2.js'); ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/materialize/js/materialize.js'); ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/materialize/js/main.js'); ?> "></script>
<script type="text/javascript" src="<?= base_url('assets/materialize/js/jquery.validate.min.js') ?>" ></script>

</body>
</html>