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
function get_param($param_name, $init_value)
{
    $param_value = $init_value;
    if  (isset($_GET[$param_name]))
    {
        $param_value = htmlspecialchars($_GET[$param_name]);
    }    
    return $param_value;
}
function debug($var){
echo '<pre>';
	var_dump($var);
echo '</pre>';
}