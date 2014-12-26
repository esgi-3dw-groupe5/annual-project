<?php
if(!defined('__ROOT__'))define('__ROOT__', $_SERVER['DOCUMENT_ROOT']."/annual-project");
require_once(__ROOT__."/controller/common.php");
require_once(__ROOT__."/controller/inscriptionController.php");
$displayErr=null;
if(isset($_POST['valider']) && !empty($_POST['valider'])) {
    $action = $_POST['valider'];
    switch($action) {
        case 'valider' : 
            $displayErr =  signin($_POST);
            /*****************/
            /*****CodeErr*****/
            /*****************/
            // 0 -> All required field not filled
            // 1 -> Un-valid email address given
            // 2 -> Email given already exit
            // 3 -> Both email given are not the same
            // 4 -> Password given do not respect requirement
            // 5 -> Both password given are not the same
            // 6 -> Pseudo given do not respect requirement 
            // 7 -> Pseudo given already exit

            // $displayErr = json_decode($displayErr);

            // $msgErr_gender  = $displayErr[];
            // $msgErr_name  = $displayErr[];
            // $msgErr_fistName  = $displayErr[];
                $msgErr_mail_1  = $displayErr[1];
                $msgErr_mail_2  = $displayErr[2];
                $msgErr_mail_3  = $displayErr[3];

                $msgErr_pseudo  = $displayErr[7];

                $msgErr_psw_1  = $displayErr[4];
                $msgErr_psw_2  = $displayErr[5];

            // $msgErr_date  = $displayErr[];
    		// echo json_encode( $displayErr );
            return;
            // debug( signin($_POST) );

        	break;
		default:
			
			break;
    }
    return;
}