$(document).ready(function(){
	$('.button-collapse').sideNav();
	$('select').material_select();

	//MODALS COMEÇO
	$('.modal-trigger').leanModal();

	$('#modal_images_open').click(function(){
		$('#modal_images').openModal();
	});

	$('#modal_features_open').click(function(){
		$('#modal_features').openModal();
	});

	$('#close_modal_images').click(function(){
		$('#modal_images').closeModal();
	});
	//MODALS FIM 


	//AJAX FORM
	$('#feature_form').submit(function(){
		var dados = $(this).serialize();
		loading();

		jQuery.ajax({
			type: "POST",
			url: "nova-caracteristica",
			data: dados,
			success: function(data)
			{
				closeLoading();
				Materialize.toast(data, 2000);
				document.getElementById('name').value = "";
				document.getElementById('description').value = "";
			},
			error: function(data){
				closeLoading();
				Materialize.toast('Falha ao tentar enviar os dados!', 2000);
				document.getElementById('name').value = "";
				document.getElementById('description').value = "";
			}
		});
		return false;
	});

	$('#login_form').submit(function(){
		var dados = jQuery(this).serialize();
		loading();

		jQuery.ajax({
			type:"POST",
			url:"login",
			data: dados,
			success: function(data){
				if(data == "true"){
					closeLoading();
					window.location = "quartos";
				}else{
					closeLoading();
					document.getElementById('login').value="";
					document.getElementById('pass').value="";
					Materialize.toast("Login ou senha invalidos!",2000);
				}
			}
		});
		return false;
	});

	$("#room_form").submit(function(){
		var formData = new FormData($(this)[0]);
		loading();

		$.ajax({
			url:window.location.pathname,
			type:'POST',
			data: formData,
			cache: false,
			resetForm: true,
			contentType: false,
			processData: false,
			success: function (data) {
				closeLoading();
				Materialize.toast(data,2000);	
			}
		});	
		return false;
	});




	$("#kind_form").submit(function(){
		var formData = new FormData($(this)[0]);
		loading();

		$.ajax({
			url: window.location.pathname,
			type: 'POST',
			data: formData,
			cache: false,
			resetForm: true,
			contentType: false,
			processData: false,
			success: function (data) {
				closeLoading();
				Materialize.toast(data,2000);	
			},
			error: function (data) {
				closeLoading();
			}
		});
		return false;
	});	

	$('#tariff_form').submit(function(){
		var dados = jQuery(this).serialize();
		loading();
		
		jQuery.ajax({
			type:"POST",
			url:"nova-tarifa",
			data: dados,
			success: function(data){
				closeLoading();
				Materialize.toast(data,2000);
				document.getElementById('tName').value="";
				document.getElementById('basePrice').value="";
			}
		});
		return false;
	});

	//AJAX TRIGGER
	function loading(){
		$('#loadingModal').openModal({dismissible: false});
	}

	function closeLoading(){
		$('#loadingModal').closeModal();
	}

	//delete ajax
	$(document).ready(function(){		
		$('.getIdFeature').click(function(){
			document.getElementById("idFeature").value = $(this).attr('id');	
		});	
	});

	$('#delete_feature_form').submit(function(){
		var dados = jQuery(this).serialize();

		jQuery.ajax({
			type:"POST",
			url:"delete-feature",
			data: dados,
			success: function(data){
				Materialize.toast(data,2000);
			}
		});
		return false;
	});

});

