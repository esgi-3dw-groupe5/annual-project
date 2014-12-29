<?php
if(!defined('__ROOT__'))define('__ROOT__', $_SERVER['DOCUMENT_ROOT']."/annual-project");
require_once(__ROOT__."/controller/common.php");
require_once(__ROOT__."/controller/inscriptionController.php");
$displayErr=null;
if(isset($_POST['valider']) && !empty($_POST['valider'])) {
    $action = $_POST['valider'];
    switch($action) {
        case 'valider' : 
            $displayErr =  validate_field($_POST);
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
            // 8 -> Date given is not a date
            // 9 -> Date given does not exit

            $msgErr_mail_1  = $displayErr[1];
            $msgErr_mail_2  = $displayErr[2];
            $msgErr_mail_3  = $displayErr[3];

            $msgErr_pseudo  = $displayErr[7];

            $msgErr_psw_1  = $displayErr[4];
            $msgErr_psw_2  = $displayErr[5];

            /***************************/
            /******Keep formm value*****/
            /***************************/

            $gender_male="checked";
            $gender_female="";
            if($_POST['genre'] == 'homme'){
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
		default:
			
			break;
    }
    return;
}