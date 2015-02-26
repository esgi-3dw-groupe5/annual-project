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

$uri = $config['source'];
$source = $config['include_path'];
$color = "";
$mode = "article";

require_once($source."controller/common.php");
require_once($source."controller/accessControl.php");
require_once($source."controller/routeControl.php");
require_once($source."controller/corePHP.php");
require_once($source."controller/inscriptionController.php");
require_once($source."fluxRss.php");

require_once($source."controller/module.php");
update_fluxRSS();
access_control();
route_control();
create_cookie();

$page = get_param('p', '');
$article = get_param('article', '');
$n = get_param('n', '');
$facet = get_cookie();

require($source."template/index.tpl");
	page_controller($mode, $page);
require($source."template/footer.tpl");