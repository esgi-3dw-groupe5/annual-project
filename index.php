<?php
require_once("controller/accessControle.php");
require_once("controller/common.php");
require_once("controller/inscriptionController.php");
require_once("controller/coreAjax.php");

echo 'Hello Pinnackl<br>';

access_control();
require_once("template/index.tpl");