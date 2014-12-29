$(document).ready(function(){
	 signin();
});





function signin(){
	$('input[name="si_email"]').change(function(){
		var send = get_form_values('signin');
		ajax_send_signin(send);
	});
	$('input[name="si_conf_email"]').change(function(){
		var send = get_form_values('signin');
		ajax_send_signin(send);
	});
	$('input[name="si_psw"]').change(function(){
		var send = get_form_values('signin');
		ajax_send_signin(send);
	});
	$('input[name="si_conf_psw"]').change(function(){
		var send = get_form_values('signin');
		ajax_send_signin(send);
	});
	$('input[name="si_pseudo"]').change(function(){
		var send = get_form_values('signin');
		ajax_send_signin(send);
	});
	$('input[name="date"]').change(function(){
		var send = get_form_values('signin');
		ajax_send_signin(send);
	});

}
function get_form_values(form){
	switch(form){
		case 'signin' :
			var send = {};
			send.valider 		=	"valider";
			send.si_email 			=	$('input[name="si_email"]').val();
			send.si_conf_email	=	$('input[name="si_conf_email"]').val();
			send.si_psw 		=	$('input[name="si_psw"]').val();
			send.si_conf_psw		=	$('input[name="si_conf_psw"]').val();
			send.si_pseudo 		=	$('input[name="si_pseudo"]').val();
			send.date 		=	$('input[name="date"]').val();
		break;

		default:
			return;
		break;
	}

	return send;
}
function ajax_send_signin(send){
	$.ajax({
		type: "POST",
		url: "http://127.0.0.1/annual-project/controller/coreAjax.php",
		data: send,
		success: function(data){
			console.log( data );
			write_error(data);
		}, 
		dataType: "json"
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
		// $('#').html(error[0]);
	}else{
		// $('#').html('');
	}

	if( error[1] != '' ){
		$('#msgErr_mail_1').html(error[1]);
	}else{
		$('#msgErr_mail_1').html('');
	}

	if( error[2] != '' ){
		$('#msgErr_mail_2').html(error[2]);
	}else{
		$('#msgErr_mail_2').html('');
	}

	if( error[3] != '' ){
		$('#msgErr_mail_3').html(error[3]);
	}else{
		$('#msgErr_mail_3').html('');
	}

	if( error[4] != '' ){
		$('#').html(error[4]);
	}else{
		$('#').html('');
	}

	if( error[5] != '' ){
		$('#msgErr_psw_2').html(error[5]);
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
	}else{
		$('#msgErr_pseudo').html('');
	}
}