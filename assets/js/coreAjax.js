$(document).ready(function(){
	 signin();
});

function signin(){
	$('input[name="email"]').keyup(function(){
		var email = $(this).val();
		var send = {valider:"valider", email:email};
		$.ajax({
			type: "POST",
			url: "http://127.0.0.1/annual-project/controller/coreAjax.php",
			data: send,
			success: function(data){
				console.log(data);
			}, 
			dataType: "text"
		});
	});
}