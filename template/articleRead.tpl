<?php
	$date = date_create($data['date']);
?>
<div class="content" onload="">
	<h2><?php print $data['title']; ?></h2>
	<br> 
	<div class="article-body" id="article-body" data-id="<?php print $data['id']?>">
		<?php print $data['content']; ?>
	<div>
	<br>
	<div>
		<span>Ecrit par : <?php print $data['author']; ?><span>
	</div>
	<div>
		<span>Publier le : <?php print date_format($date, 'd/m/Y'); ?><span>
	</div>
</div>
<script type="text/javascript">

	historic();
	function historic(){
		var send = {};
		var article = document.querySelector('#article-body');
		var id_article = article.dataset.id;

		send.id_article = id_article;
		send.at_historic = "at_historic";
		$.ajax({
			type : "POST",
   				url  : "http://www.pinnackl.com/controller/coreAjax.php",
   				data : send,
   				success: function(data){
   					console.log(data);
   				},
   				dataType :"json"
				});
	}
</script>
