<?php
function access_control(){
	if(is_session_started() === FALSE){
		session_start();
	}
    if(!isset($_SESSION['user'] )){
        $_SESSION['user'] = [];
        set_user_session(false);
    }
}

function set_user_session($success, $pseudo = null, $email = null, $role = null){
    if(is_session_started() === FALSE){
       session_start();
    }
    if( $success ){
        $_SESSION['user']['pseudo']     =   $pseudo;
        $_SESSION['user']['email']      =   $email;
        $_SESSION['user']['type']       =   "member";
        $_SESSION['user']['role']       =   $role;
        $_SESSION['user']['connected']  =   true;
    }
    else{
        $_SESSION['user']['pseudo']     =   null;
        $_SESSION['user']['email']      =   null;
        $_SESSION['user']['type']       =   'visitor';
        $_SESSION['user']['role']       =   'viewer';
        $_SESSION['user']['connected']  =   false;
    }
}

function is_session_started(){
// @return bool
    if ( php_sapi_name() !== 'cli' ) {
        if ( version_compare(phpversion(), '5.4.0', '>=') ) {
            return session_status() === PHP_SESSION_ACTIVE ? TRUE : FALSE;
        } else {
            return session_id() === '' ? FALSE : TRUE;
        }
    }
    return FALSE;
}

function end_session(){
    if(is_session_started() === FALSE){
       session_start();
    }
    session_destroy();
}

function redirect(){
    // redirect user to his current location after login
    header('location: http://127.0.0.1/annual-project/');
}