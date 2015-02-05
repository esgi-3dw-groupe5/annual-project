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
if(!defined('__ROOT__'))define('__ROOT__', $_SERVER['DOCUMENT_ROOT']."/annual-project"); // php function ?
require_once(__ROOT__."/controller/accessControl.php");
require_once(__ROOT__."/controller/common.php");
require_once(__ROOT__."/controller/inscriptionController.php");
require_once(__ROOT__."/controller/corePHP.php");
require_once(__ROOT__."/controller/module.php");
access_control();
// if($_GET['p'] == 'pp_admin')
// 	header('Location: /annual-project/pp_admin/plop/');

$page = get_param('p', '');debug($_GET);
$article = get_param('article', '');
// require_once(__ROOT__."/template/index.tpl");
	// render_articles($page);
// include(__ROOT__."/template/footer.tpl");
// debug($_SESSION);
debug($_SERVER['REQUEST_URI']);