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

	<script type="text/javascript">
		$(document).ready(function(){
			var base_url = "http://10.0.0.106/PHP/webhotel-in/"
			$("body").on("submit", "#check_date", function(e){
				e.preventDefault();
				$.ajax({
					url: base_url+"check_date",
					type: "POST",
					data: $("#check_date").serialize(),
					success: function(data){
						alert(data);
					},
					error: function(data){	
						console.log(data);
						alert("Ocorreu algum erro de conexão ;(");
					}
				});
			});
		});
	</script>
	<style type="text/css">
		.center{
		     float: none;
		     margin-left: auto;
		     margin-right: auto;
		     text-align: center;
		}
		.date{
			margin-top: 30%;
		}
		.date input, .date button{
			height: 50px;
		}
	</style>
</head>
<body>
	<section class="container">
		<article class="row">
			<div class="col-sm-12 col-centered date">
				<form id="check_date" class="form-inline center">
					<div class="form-group">
						<label>Chegada</label>
						<br>
						<input type="date" required="true" class="form-control" name="start_date">
					</div>
					<div class="form-group">
						<label>Saida</label>
						<br>
						<input type="date" required="true" class="form-control" name="end_date">
					</div>
					<div class="form-group">
						<br>
						<button type="submit" class="btn btn-primary" type="submit">Verificar</button>
					</div>
				</form>
			</div>
		</article>
	</section>
</body>
</html>
<div id="teste">
	
</div>