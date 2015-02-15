<?php
require_once($source."controller/common.php");
require_once($source."controller/accessControl.php");
require_once($source."controller/inscriptionController.php");
require_once($source."controller/articleController.php");
require_once($source."controller/commentController.php");
$displayErr=null;
$action=null;

if( isset($_POST['si_submit']) && !empty($_POST['si_submit']) ) {
    $action = $_POST['si_submit'];
}
if( isset($_POST['li_submit']) && !empty($_POST['li_submit']) ) {
    $action = $_POST['li_submit'];
}

if( isset($_POST['at_submit']) && !empty($_POST['at_submit']) ) {
    $action = $_POST['at_submit'];
}

if( isset($_POST['at_update_submit']) && !empty($_POST['at_update_submit']) ) {
    $action = $_POST['at_update_submit'];
}

if( isset($_POST['at_delete']) && !empty($_POST['at_delete']) ) {
    $action = $_POST['at_delete'];
}

if( isset($_POST['co_submit']) && !empty($_POST['co_submit']) ) {
    $action = $_POST['co_submit'];
}

if( isset($_POST['co_report']) && !empty($_POST['co_report']) ) {
    $action = $_POST['co_report'];
}

if( isset($_GET['act']) && !empty($_GET['act']) ) {
    $action = $_GET['act'];
}

if( isset($_POST['mail_submit']) && !empty($_POST['mail_submit']) ) {
    $action = $_POST['mail_submit'];
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

            $si_msgErr         = $displayErr[0];
            $si_msgErr_mail_1  = $displayErr[1];
            $si_msgErr_mail_2  = $displayErr[2];
            $si_msgErr_mail_3  = $displayErr[3];

            $si_msgErr_pseudo  = $displayErr[7];

            $si_msgErr_psw_1   = $displayErr[4];
            $si_msgErr_psw_2   = $displayErr[5];

            /***************************/
            /******Keep formm value*****/
            /***************************/

            $gender_male="checked";
            $gender_female="";
            if($_POST['gender'] == '0'){
                $gender_male = "checked";
                $gender_female = "";
            }
            else{
                $gender_male = "";
                $gender_female = "checked";
            }
            $value_name = $_POST['si_name'];
            $value_firstname = $_POST['si_fistname'];

            $value_mail_1 = $_POST['si_email'];
            $value_mail_2 = $_POST['si_conf_email'];
            $value_pseudo = $_POST['si_pseudo'];
            $value_date = $_POST['date'];

            return;

            break;
        case 'connexion' :
            // use PRG pattern V2
            $displayErr =  validate_field($_POST);

            $li_msgErr          =   $displayErr[12];
            $li_msgErr_login    =   $displayErr[10];
            $li_msgErr_psw      =   $displayErr[11];
            break;

        case 'logout':                
                end_session();
                redirect();
            break;

        case 'envoyer' :
                $value = "create";
                $displayErr           =   validate_article($_POST,$_FILES,$value);
                $at_msgErr            =   $displayErr[0];
                $at_msgErr_image      =   $displayErr[13];
                $at_msgErr_image1     =   $displayErr[14];
                return;
            break;

        case 'modifier' :
                $value = "update";
                $displayErr     =   validate_article($_POST,$_FILES,$value);
                $at_msgErr      =   $displayErr[0];
            break;
            
        case 'commenter' :
                $displayErr     =   validate_comment($_POST);
                $co_msgErr      =   $displayErr[0];
            break;

        case 'signaler' : 
                report_comment($_POST);
            break;
       
       case 'Renvoyer un Mail' : 
                validate_field($_POST);
            break;
        default:
            
            break;
    }