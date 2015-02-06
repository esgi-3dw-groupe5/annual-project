<header>
	<!-- <h1>Pinnackl</h1> -->
	<img class="titre" src="<?php print($config['source']); ?>/images/titre.gif">
	<img class="logo" src="<?php print($config['source']); ?>/images/logo-gris.gif">

<nav class="header">
	<?php render_contents('menu');
    // $link = db_connect();
    // debug($link);
    // $result = db_get_content($link,'menu');
    // debug($result);
    // $data = $result -> fetchAll();
    // debug($data);
    // while ($data = $result -> fetch()) {
    //     echo $data['tag'];
    // }

	?>

</nav>
</header>
