<!DOCTYPE html>
<html>
<head>
	<title>
		
	</title>
			<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

		<!-- Optional theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
		<script type="text/javascript" src="<?php echo base_url('assets/js/responsiveslides.min.js'); ?>"></script>

		<script type="text/javascript">
			$(document).ready(function(){
				$("body").on("click", ".quarto", function(){
					var id = $(this).attr("id");
					$.ajax({
						url: "<?php echo site_url('AvailableRoomsController/teste/') ?>",
						type: "POST",
						data: {id: id},
						success: function(data){
							$("#teste").slideToggle('slow');
							$("#teste").html(data);
							$(".rslides").responsiveSlides({
						        auto: true,
						        speed: 500
							});
						},
						error: function(data){
							alert("A");
							console.log(data);
						}
					});
				});
				$("body").on("click", ".close", function(){
					$("#teste").slideToggle('slow');
				});

			});
		</script>
		<style type="text/css">
			.quarto{
				cursor: pointer;
				margin-left: 5px;
				background-repeat: no-repeat;
				background-size: cover; /*Css padrão*/
				-webkit-background-size: cover; /*Css safari e chrome*/
				-moz-background-size: cover; /*Css firefox*/
				-ms-background-size: cover; /*Css IE não use mer#^@%#*/
				-o-background-size: cover; /*Css Opera*/;
				height: 200px;
				color: white;
			}
			.quarto:hover{
				opacity: 0.5;
				color: black;
			}
			#teste{
				background-color: #eaebed;
				width: 100%;
				max-height: 350px;
				height: auto;
				display: none;
				position: absolute;
				bottom: 0;
				left: 0;
				z-index: 99;	
			}
		</style>
</head>
<body>
	<section class="container">
		<article>
			<div class="col-sm-12 quartos">
				<?php
					foreach ($rooms as $key => $room): ?>
						<div id="<?= $room['id_room']; ?>" class='col-sm-3 quarto' style="background-image: url('<?= base_url('assets/img/uploads/').$room['kind_image_route']; ?>');">
							<h3>Quarto: <?= $room["number_room"]; ?></h3>
							<p><?= $room["description_room"]; ?></p>
						</div>
				<?php
				endforeach;
				?>
			</div>
		</article>
	</section>
</body>
</html>
<div id="teste">
	
</div>