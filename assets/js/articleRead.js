$(document).ready(function(){
	change_state();
});


function change_state(){

	$(".read").click(function(){

		var send = {};
		send.id_article = $(this).attr('id');
		send.at_read_later = "at_read_later";

		$.ajax({
		type : "POST",
			url  : "http://127.0.0.1/annual-project/controller/coreAjax.php",
			data : send,
			success: function(data){
			},
			dataType :"json"
		});

		if( $(this).attr('class') == "read" ){
			$(this).removeClass('read');
			$(this).removeClass('unread');

			$(this).addClass('unread');
		}
		else{
			$(this).removeClass('read');
			$(this).removeClass('unread');

			$(this).addClass('read');
		}
	});
	$(".unread").click(function(){

		var send = {};
		send.id_article = $(this).attr('id');
		send.at_read_later = "at_read_later";

		$.ajax({
		type : "POST",
			url  : "http://127.0.0.1/annual-project/controller/coreAjax.php",
			data : send,
			success: function(data){
			},
			dataType :"json"
		});

		if( $(this).attr('class') == "unread" ){
			$(this).removeClass('read');
			$(this).removeClass('unread');

			$(this).addClass('read');
		}
		else{
			$(this).removeClass('read');
			$(this).removeClass('unread');

			$(this).addClass('unread');
		}
	});
}