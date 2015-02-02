<?php
if(!defined('__ROOT__'))define('__ROOT__', $_SERVER['DOCUMENT_ROOT']."/annual-project");
require_once(__ROOT__."/controller/common.php");
require_once(__ROOT__."/controller/accessControl.php");
require_once(__ROOT__."/controller/inscriptionController.php");
require_once(__ROOT__."/controller/articleController.php");
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

if( isset($_POST['at_delete']) && !empty($_POST['at_delete']) ) {
    $action = $_POST['at_delete'];
}

if( isset($_GET['act']) && !empty($_GET['act']) ) {
    $action = $_GET['act'];
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
            $displayErr =  validate_field($_POST);

            $li_msgErr          =   $displayErr[12];
            $li_msgErr_login    =   $displayErr[10];
            $li_msgErr_psw      =   $displayErr[11];
            break;

        case 'logout':                
                end_session();
                redirect();
            break;

        case 'Envoyer' :
                $displayErr     =   validate_article($_POST);
                $at_msgErr      =   $displayErr[0];
            break;

        default:
            
            break;
    }