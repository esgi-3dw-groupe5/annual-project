<?php
if(!isset($source)) $source = $_SERVER['DOCUMENT_ROOT']."/annual-project/";
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
if(isset($_POST['at_historic']) && !empty($_POST['at_historic'])) {
    $action = $_POST['at_historic'];
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

            echo $displayErr;
        case 'co_report' :
            report_comment($_POST);
            return;
            break;
        case 'at_read_later' :
            $link = db_connect();

            $result = db_get_user_id($link);
            $data = $result->fetch();
            $id_user = $data['id'];
            $id_article = $_POST['id_article'];
            $req = db_get_status($link,$id_user,$id_article);
            $data = $req -> fetch();

            if($data['status'] == 'nonlu'){$status = 'lu'; read($_POST,$status,$id_user,$id_article);}
            elseif($data['status'] == 'lu'){$status = 'nonlu'; read($_POST,$status,$id_user,$id_article);}
            elseif($data['status'] == false){$status = 'notset_nonlu'; read($_POST,$status,$id_user,$id_article);}
            return;
            break;
        case 'at_historic':
            $link = db_connect();
            $result = db_get_user_id($link);
            $data = $result->fetch();
            $id_user = $data['id'];
            $id_article = $_POST['id_article'];
            $req = db_get_status($link,$id_user,$id_article);
            $data = $req -> fetch();

            if($data['status'] == false){$status = 'notset_lu'; read($_POST,$status,$id_user,$id_article);}
            elseif($data['status'] == 'nonlu'){$status = 'lu'; read($_POST,$status,$id_user,$id_article);}
            break;
        default:
            
            break;
    }

