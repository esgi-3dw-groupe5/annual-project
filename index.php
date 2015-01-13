<?php
if(!defined('__ROOT__'))define('__ROOT__', $_SERVER['DOCUMENT_ROOT']."/annual-project");
require_once(__ROOT__."/controller/accessControl.php");
require_once(__ROOT__."/controller/common.php");
require_once(__ROOT__."/controller/inscriptionController.php");
require_once(__ROOT__."/controller/corePHP.php");

$page = get_param('p', '');
echo $page;
access_control();
require_once(__ROOT__."/template/index.tpl");
// debug($_SESSION);
// debug($_SERVER);


include(__ROOT__."/template/footer.tpl");