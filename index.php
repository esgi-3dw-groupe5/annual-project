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
require_once($source."fluxRss.php");

require_once($source."controller/module.php");
update_fluxRSS();
access_control();
route_control();

$page = get_param('p', '');
$article = get_param('article', '');

require_once($source."template/index.tpl");
	render_contents($page);
include($source."template/footer.tpl");
