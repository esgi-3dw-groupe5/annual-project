$(document).ready(function(){
	change_state();
});


function change_state(){

	$(".read").click(function(){

		var send = {};
		send.id_article = $(this).attr('id');
		send.at_read_later = "at_read_later";

		// user existing function
		ajax_send(send);

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

		// user existing function
		ajax_send(send);

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