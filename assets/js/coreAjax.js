$(document).ready(function(){
	 signin();
});

function signin(){
	$('input[name="email"]').change(function(){
		var item = $(this).val();
		var send = {valider:"valider", email:item};
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
// msgErr_gender
// msgErr_name
// msgErr_fistName
// msgErr_mail_1
// msgErr_mail_2
// msgErr_pseudo
// msgErr_psw_1
// msgErr_psw_2
// msgErr_date
	if( error[7] != '' ){
		$('#msgErr_pseudo').html(error[7]);
	}
}