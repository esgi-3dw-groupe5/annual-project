<?php
function access_control(){
	session_start();
	if(is_session_started() === TRUE){
		$_SESSION['user'] = [];
		$_SESSION['user']['type'] = 'visitor';
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
	session_destroy();
}