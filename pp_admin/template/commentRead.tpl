<div>
	<?php printf('<h2>%s</h2>', $data_comment['author']);?>
	<?php 
	if($data_comment['status'] == 1){
		printf('<p>Ce commentaire a été signalé.</p>');
	}
	elseif ($data_comment['status'] == 0) {
		printf('<div class="article-body">%s</div>',$data_comment['comment']); 
	}?>

	<?php printf('<p>Posté le : %s</p>', $data_comment['date_comment']);?>
</div>

<?php if( $_SESSION['user']['connected'] ){?>
<input type="submit" data-id="<?php print($data_comment['id']); ?>" onclick="signal(this)" name="co_report" value="signaler">
<script type="text/javascript">
    function signal(comment){
     justify ="";
     var id = $(comment).attr('data-id');

     var confi = confirm('Voulez vous vraiment signaler ce commentaire');

    

     var justify = prompt("Pour quelle raison ?");

    

     if(confi && justify != ""){
      var send = {};

      send.id = id;
      send.justify = justify;
      send.co_report = "co_report";
     
      $.ajax({
       type: "POST",
       url: location.protocol+"//"+location.host+"/controller/coreAjax.php",
       data: send,
       success: function(data){
      console.log( data );
       }, 
       dataType: "json"
      });
     }
 }
</script>
<?php } ?>