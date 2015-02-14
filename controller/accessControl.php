<?php
function access_control(){
	if(is_session_started() === FALSE){
		session_start();
	}
    if(!isset($_SESSION['user'] )){
        $_SESSION['user'] = [];
        set_user_session(false);
    }

    $page = get_param('p', '');
    // debug($_SESSION);

    $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        if(!is_submited('_POST'))
            $_SESSION['url']                =   $url;
}

function set_user_session($success, $pseudo = null, $email = null, $role = null){
    if(is_session_started() === FALSE){
       session_start();
    }
    $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    if( $success ){
        $_SESSION['user']['pseudo']     =   $pseudo;
        $_SESSION['user']['email']      =   $email;
        $_SESSION['user']['role']       =   $role;
        $_SESSION['user']['connected']  =   true;
        if(!is_submited('_POST'))
            $_SESSION['url']                =   $url;
    }
    else{
        $_SESSION['user']['pseudo']     =   null;
        $_SESSION['user']['email']      =   null;
        $_SESSION['user']['role']       =   'viewer';
        $_SESSION['user']['connected']  =   false;
        if(!is_submited('_POST'))
            $_SESSION['url']                =   $url;
    }
}

function set_admin_session($success, $pseudo = null, $email = null, $role = null){
    if(is_session_started() === FALSE){
       session_start();
    }
    $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    if( $success ){
        $_SESSION['admin']['pseudo']     =   $pseudo;
        $_SESSION['admin']['email']      =   $email;
        $_SESSION['admin']['role']       =   $role;
        $_SESSION['admin']['connected']  =   true;
        if(!is_submited('_POST'))
            $_SESSION['url']                =   $url;
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
    $_SESSION = array();
    session_destroy();
}

function redirect(){
    // redirect user to his current location after login
    header('location: http://127.0.0.1/annual-project/');
}

function start_session(){
    if(is_session_started() === FALSE){
        session_start();
    }
}

function access_denied() {
    end_session();
    session_start();                                                              
    $errorMessage = "Accès Refusé";
    $_SESSION['errorMessage'] = $errorMessage;
    redirect();
}


function secure_admin() {
    start_session();
    if(!isset($_SESSION['user']['role'])
       ||($_SESSION['user']['role']!='administrator')){
        access_denied();
    }
}

?>