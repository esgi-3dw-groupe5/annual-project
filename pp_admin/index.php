<?php
if(!file_exists('../config.php')){
	echo '
		<h1>Super fatal error : <h1>
		<h2> Configuration file is missing ! <h2>
		<h3>This file contains important information for the proper functioning of this website.<h3>
		';
	die();
}
require('../config.php');

$uri = $config['source'];
$source = $config['include_path'];
$color = "";
$mode = "administrator";

require_once($source."pp_admin/controller/common.php");
require_once($source."pp_admin/controller/accessControl.php");
require_once($source."pp_admin/controller/routeControl.php");
require_once($source."pp_admin/controller/corePHP.php");

require_once($source."pp_admin/controller/module.php");
access_control();
// route_control();
create_cookie();
secure_admin();

$page = get_param('p', '');
$edit = get_param('edit', '');

require($source."pp_admin/template/index.tpl");
	page_controller($mode, $page, $edit);
require($source."pp_admin/template/footer.tpl");