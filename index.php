<?php
if(!defined('__ROOT__'))define('__ROOT__', $_SERVER['DOCUMENT_ROOT']."/annual-project");
require_once(__ROOT__."/controller/accessControl.php");
require_once(__ROOT__."/controller/common.php");
require_once(__ROOT__."/controller/inscriptionController.php");
require_once(__ROOT__."/controller/corePHP.php");

// echo 'Hello Pinnackl<br>';

access_control();
include(__ROOT__."/template/header.tpl");
require_once(__ROOT__."/template/index.tpl");
// debug($_SESSION);
// var_dump($_SERVER);


include(__ROOT__."/template/footer.tpl");