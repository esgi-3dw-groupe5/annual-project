<?php
if(!defined('__ROOT__'))define('__ROOT__', $_SERVER['DOCUMENT_ROOT']."/annual-project");
require_once(__ROOT__."/controller/common.php");
require_once(__ROOT__."/controller/inscriptionController.php");
$displayErr=null;
$action=null;

if(isset($_POST['si_submit']) && !empty($_POST['si_submit'])) {
    $action = $_POST['si_submit'];
}
if( isset($_POST['act']) && !empty($_POST['act']) ) {
    $action = $_POST['act'];
}

    switch($action) {
        case 'valider' : 
            $displayErr =  validate_field($_POST);
            /*****************/
            /*****CodeErr*****/
            /*****************/
            // ********************Singin********************
            // 0 -> All required field not filled
            // 1 -> Un-valid email address given
            // 2 -> Email given already exit
            // 3 -> Both email given are not the same
            // 4 -> Password given do not respect requirement
            // 5 -> Both password given are not the same
            // 6 -> Pseudo given do not respect requirement 
            // 7 -> Pseudo given already exit
            // 8 -> Date given is not a date
            // 9 -> Date given does not exit
            // *********************Login*********************
            // 10 -> Un-valid email address given
            // 11 -> All required field not filled
            // 12 -> Bad login given

            $displayErr = json_encode($displayErr);

            $si_msgErr       = $displayErr[0];
            $si_msgErr_mail_1  = $displayErr[1];
            $si_msgErr_mail_2  = $displayErr[2];
            $si_msgErr_mail_3  = $displayErr[3];

            $si_msgErr_pseudo  = $displayErr[7];

            $si_msgErr_psw_1   = $displayErr[4];
            $si_msgErr_psw_2   = $displayErr[5];

            echo $displayErr;
            return;

            break;
        default:
            
            break;
    }