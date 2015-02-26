$(document).ready(function(){
	 signin();
	 prevent_empty_form();
});

function signin(){
	$('input[name="si_email"]').change(function(){
		var send = get_form_values('signin');
		ajax_send(send, write_error);
	});
	$('input[name="si_conf_email"]').change(function(){
		var send = get_form_values('signin');
		ajax_send(send, write_error);
	});
	$('input[name="si_psw"]').change(function(){
		var send = get_form_values('signin');
		ajax_send(send, write_error);
	});
	$('input[name="si_conf_psw"]').change(function(){
		var send = get_form_values('signin');
		ajax_send(send, write_error);
	});
	$('input[name="si_pseudo"]').change(function(){
		var send = get_form_values('signin');
		ajax_send(send, write_error);
	});
	$('input[name="date"]').change(function(){
		var send = get_form_values('signin');
		ajax_send(send, write_error);
	});

}
function get_form_values(form){
	switch(form){
		case 'signin' :
			var send = {};
			send.si_submit 		=	"valider";
			send.ajax 			=	"ajax";
			send.si_email 		=	$('input[name="si_email"]').val();
			send.si_conf_email	=	$('input[name="si_conf_email"]').val();
			send.si_psw 		=	$('input[name="si_psw"]').val();
			send.si_conf_psw	=	$('input[name="si_conf_psw"]').val();
			send.si_pseudo 		=	$('input[name="si_pseudo"]').val();
			send.date 			=	$('input[name="date"]').val();
		break;

		default:
			return;
		break;
	}

	return send;
}
function ajax_send(send, callback, type){
	callback = (typeof callback === "undefined") ? function(){} : callback;
	type = (typeof type === "undefined") ? "json" : type;
	$.ajax({
		type: "POST",
		url: location.protocol+"//"+location.host+"/controller/coreAjax.php",
		data: send,
		success: function(data){callback(data)}, 
		dataType: type
	});
}

function write_error(error){
	/*****************/
	/*****CodeErr*****/
	/*****************/
	// 0 -> All required field not filled
	// 1 -> Un-valid email address given
	// 2 -> Email given already exit
	// 3 -> Both email given are not the same
	// 4 -> Password given do not respect requirement
	// 5 -> Both password given are not the same
	// 6 -> Pseudo given do not respect requirement 
	// 7 -> Pseudo given already exit
	// 8 -> Date given is not a date
	// 9 -> Date given does not exit
	
	// msgErr_name
	// msgErr_fistName
	// msgErr_mail_1
	// msgErr_mail_2
	// msgErr_mail_3
	// msgErr_pseudo
	// msgErr_psw_1
	// msgErr_psw_2
	// msgErr_date

	if( error[0] != '' ){
		$('#si_msgErr').html(error[0]);
			$('#si_form').submit(function(event){
				enablePreventDefault(event);
			});
	}else{
		$('#msgErr').html('');
	}

	if( error[1] != '' ){
		$('#msgErr_mail_1').html(error[1]);
		$('#msgErr').html("");
			$('#si_form').submit(function(event){
				enablePreventDefault(event);
			});
	}else{
		$('#msgErr_mail_1').html('');
	}

	if( error[2] != '' ){
		$('#msgErr_mail_2').html(error[2]);
		$('#msgErr').html("");
			$('#si_form').submit(function(event){
				enablePreventDefault(event);
			});
	}else{
		$('#msgErr_mail_2').html('');
	}

	if( error[3] != '' ){
		$('#msgErr_mail_3').html(error[3]);
		$('#msgErr').html("");
			$('#si_form').submit(function(event){
				enablePreventDefault(event);
			});
	}else{
		$('#msgErr_mail_3').html('');
	}

	if( error[4] != '' ){
		$('#msgErr_psw_1').html(error[4]);
		$('#msgErr').html("");
			$('#si_form').submit(function(event){
				enablePreventDefault(event);
			});
	}else{
		$('#msgErr_psw_1').html('');
	}

	if( error[5] != '' ){
		$('#msgErr_psw_2').html(error[5]);
		$('#msgErr').html("");
			$('#si_form').submit(function(event){
				enablePreventDefault(event);
			});
	}else{
		$('#msgErr_psw_2').html('');
	}

	if( error[6] != '' ){
		// $('#').html(error[6]);
	}else{
		 // $('#').html('');
	}

	if( error[7] != '' ){
		$('#msgErr_pseudo').html(error[7]);
		$('#msgErr').html("");
			$('#si_form').submit(function(event){
				enablePreventDefault(event);
			});
	}else{
		$('#msgErr_pseudo').html('');
	}

	if(error[0]=='' && 
	   error[1]=='' &&
	   error[2]=='' &&
	   error[3]=='' &&
	   error[4]=='' &&
	   error[5]=='' &&
	   error[6]=='' &&
	   error[7]=='' &&
	   $('input[name="si_email"]').val() 		!= "" &&
	   $('input[name="si_conf_email"]').val() 	!= "" &&
	   $('input[name="si_psw"]').val() 			!= "" &&
	   $('input[name="si_conf_psw"]').val() 	!= "" &&
	   $('input[name="si_pseudo"]').val() 		!= "" &&
	   $('input[name="date"]').val() 			!= ""
	   ){
		$('#si_form').unbind('submit');
	}
}

function enablePreventDefault(event){
	event.preventDefault();
}

function prevent_empty_form(){
	if(
		$('input[name="si_email"]').val() 		== "" &&
		$('input[name="si_conf_email"]').val() 	== "" &&
		$('input[name="si_psw"]').val() 		== "" &&
		$('input[name="si_conf_psw"]').val() 	== "" &&
		$('input[name="si_pseudo"]').val() 		== "" 
	)
	{

		$('#si_form').submit(function(event){
			enablePreventDefault(event);
			// $('#msgErr').html("Vous devez remplire tous les champs obligatoire !");
		});
	}
}