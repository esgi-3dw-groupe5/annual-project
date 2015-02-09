<?php
if(!file_exists('config.php')){
	echo '
		<h1>Super fatal error : <h1>
		<h2> Configuration file is missing ! <h2>
		<h3>This file contains important information for the proper functioning of this website.<h3>
		';
	die();
}
require('config.php');
$source = $config['include_path'];
require_once($source."controller/common.php");
require_once($source."controller/accessControl.php");
require_once($source."controller/routeControl.php");
require_once($source."controller/corePHP.php");
require_once($source."controller/inscriptionController.php");

require_once($source."controller/module.php");

access_control();
route_control();

$page = get_param('p', '');
$article = get_param('article', '');
	
// debug($_GET);
// debug($_SERVER['REQUEST_URI']);
require_once($source."template/index.tpl");
	// render_articles($page);
include($source."template/footer.tpl");
// debug($_SESSION);
// debug($_SERVER['REQUEST_URI']);


echo'<pre>';
var_dump(__ROOT__);
var_dump($page);
var_dump($article);
// var_dump($source);
// var_dump($_SERVER);
echo'</pre>';