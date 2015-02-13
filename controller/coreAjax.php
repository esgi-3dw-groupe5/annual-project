<?php
if(!isset($source)) $source = $_SERVER['DOCUMENT_ROOT']."annual-project/";
require_once($source."controller/common.php");
require_once($source."controller/inscriptionController.php");
require_once($source."controller/articleController.php");
require_once($source."controller/commentController.php");
$displayErr=null;
$action=null;

if(isset($_POST['si_submit']) && !empty($_POST['si_submit'])) {
    $action = $_POST['si_submit'];
}
if(isset($_POST['co_submit']) && !empty($_POST['co_submit'])) {
    $action = $_POST['co_submit'];
}
if(isset($_POST['co_report']) && !empty($_POST['co_report'])) {
    $action = $_POST['co_report'];
}
if(isset($_POST['at_read_later']) && !empty($_POST['at_read_later'])) {
    $action = $_POST['at_read_later'];
}
if(isset($_POST['at_read']) && !empty($_POST['at_read'])) {
    $action = $_POST['at_read'];
}
if(isset($_POST['at_submit']) && !empty($_POST['at_submit'])) {
    $action = $_POST['at_submit'];
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
            // *********************Article*******************
            // 13 -> Wrong image's format

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
        case 'commenter' :
            $displayErr = validate_comment($_POST);
            $displayErr = json_encode($displayErr);
            $co_msgErr  = $displayErr[0];

            echo $displayErr;
            return;
        case 'envoyer' :
            $value = "create";
            $displayErr       = validate_article($_POST,$_FILES,$value);
            $displayErr       = json_encode($displayErr);
            $at_msgErr        = $displayErr[0];
            $at_msgErr_image  = $displayErr[13];
            $at_msgErr_image1 = $displayErr[14];
            var_dump($displayErr);

            echo $displayErr;
        case 'co_report' :
            report_comment($_POST);
            return;
            break;
        case 'at_read_later' :
            read_later($_POST);
            return;
            break;
        case 'at_read' :
            read($_POST);
            return;
            break;
        default:
            
            break;
    }

