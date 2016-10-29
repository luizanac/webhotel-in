<script type="text/javascript">
		$(".rslides").responsiveSlides({
			auto: true,
			speed: 500
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
	}
	i{
		position: absolute;
		right: 0;
		top: 25px;
	}
</style>
<div class="detalhe">
	<i class="glyphicon glyphicon-remove-circle close"></i>
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
</div>