$(document).ready(function(){
	 signin();
});

function signin(){
	$('input[name="email"]').change(function(){
		var item = $(this).val();
		var send = {valider:"valider", email:item};
		ajax_send_signin(send);
	});
	$('input[name="confirmEmail"]').change(function(){
		var item = $(this).val();
		var send = {valider:"valider", email:$('input[name="email"]').val(),confirmEmail:item};
		ajax_send_signin(send);
	});
	$('input[name="pseudo"]').change(function(){
		var item = $(this).val();
		var send = {valider:"valider", pseudo:item};
		ajax_send_signin(send);
	});
	$('input[name="password"]').change(function(){
		var item = $(this).val();
		var send = {valider:"valider", password:item};
		ajax_send_signin(send);
	});
	$('input[name="confirmMdp"]').change(function(){
		var item = $(this).val();
		var send = {valider:"valider", confirmMdp:item};
		ajax_send_signin(send);
	});
	$('input[name="pseudo"]').change(function(){
		var item = $(this).val();
		var send = {valider:"valider", pseudo:item};
		ajax_send_signin(send);
	});

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
	// 8 -> Date is not right
	
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
	}
	if( error[1] != '' ){
		$('#msgErr_mail_1').html(error[1]);
	}
	if( error[2] != '' ){
		$('#msgErr_mail_2').html(error[2]);
	}
	if( error[3] != '' ){
		$('#msgErr_mail_3').html(error[3]);
	}
	if( error[4] != '' ){
		$('#').html(error[4]);
	}
	if( error[5] != '' ){
		$('#msgErr_psw_2').html(error[5]);
	}
	if( error[6] != '' ){
		// $('#').html(error[6]);
	}
	if( error[7] != '' ){
		$('#msgErr_pseudo').html(error[7]);
	}
}