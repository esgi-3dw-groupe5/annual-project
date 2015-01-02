<?php
require_once("common.php");
require_once("inscriptionController.php");

if(isset($_POST['valider']) && !empty($_POST['valider'])) {
    $action = $_POST['valider'];
    switch($action) {
        case 'valider' : 
        		echo signin($_POST);
        		// debug($_POST);
        	break;
		default:
			
			break;
    }
    return;
}