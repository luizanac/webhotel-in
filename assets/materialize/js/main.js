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

	function ajaxSerialized(form){
		var dados = $(form).serialize();
		loading();

		jQuery.ajax({
			type: "POST",
			url: window.location.pathname,
			data: dados,
			success: function(data)
			{
				closeLoading();
				Materialize.toast(data, 2000);
			},
			error: function(data){
				closeLoading();
				Materialize.toast('Falha ao tentar enviar os dados!', 2000);
			}
		});
	}

	function ajaxFormData(form){
		var formData = new FormData($(form)[0]);
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
	}


	//AJAX FORM
	$('#feature_form').submit(function(){
		ajaxSerialized(this);
		$('#feature_form')[0].reset();
		return false;
	});

	$('#login_form').submit(function(){
		var dados = $(this).serialize();
		$('#login_form')[0].reset();
		loading();

		jQuery.ajax({
			type: "POST",
			url: window.location.pathname,
			data: dados,
			success: function(data)
			{
				closeLoading();
				if(data == "true"){
					location.reload();
				}else{
					Materialize.toast("Dados inválidos!", 2000);
				}			
			},
			error: function(data){
				closeLoading();
				Materialize.toast('Falha ao tentar enviar os dados!', 2000);
			}
		});
	return false;
	});

	$("#room_form").submit(function(){
		ajaxFormData(this);
		$('#room_form')[0].reset();
		return false;
	});

	$("#kind_form").submit(function(){
		ajaxFormData(this);
		$('#kind_form')[0].reset();
		return false;
	});	

	$('#tariff_form').submit(function(){
		ajaxSerialized(this);
		$('#tariff_form')[0].reset();
		return false;
	});

	$('#update_tariff_form').submit(function(){
		ajaxSerialized(this);
		$('#update_tariff_form')[0].reset();
		return false;
	});

	//AJAX TRIGGER
	function loading(){
		$('#loadingModal').openModal({dismissible: false});
	}

	function closeLoading(){
		$('#loadingModal').closeModal();
	}	
});

