$(document).ready(function(){
	$(".facet").change(function(){
		
		var send = getFacet();
		ajax_send(send, function(){

		},"text");
	});
	// var send = getFacet();
	// ajax_send(send, function(data){
	// 	console.log(data);
	// });

});

function getFacet(){
	var send = {};
	send.facet_search = "facet_search";
	send.values = {};
	for(var i = 0; i<$(':input.facet').length; i++){
		send.values[$($(':input.facet')[i]).attr('name')] = $($(':input.facet')[i]).val();
	}
	return send;
}