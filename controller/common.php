<?php
function variable_control($var){
	if( !empty($var) ){
		$plop = trim($var);
		return $plop;
	}
	return false;
}
function variable_control_full($var){
	if( !empty($var) ){
		$plop = preg_replace("/(\s)/", "", $var);
		return $plop;
	}
	return false;
}

function debug($var){
echo '<pre>';
	var_dump($var);
echo '</pre>';
}