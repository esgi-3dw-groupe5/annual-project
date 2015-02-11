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

function cleanString($string)
{
	$caracteres = array(
		'À' => 'a', 'Á' => 'a', 'Â' => 'a', 'Ä' => 'a', 'à' => 'a', 'á' => 'a', 'â' => 'a', 'ä' => 'a', '@' => 'a',
		'È' => 'e', 'É' => 'e', 'Ê' => 'e', 'Ë' => 'e', 'è' => 'e', 'é' => 'e', 'ê' => 'e', 'ë' => 'e', '€' => 'e',
		'Ì' => 'i', 'Í' => 'i', 'Î' => 'i', 'Ï' => 'i', 'ì' => 'i', 'í' => 'i', 'î' => 'i', 'ï' => 'i',
		'Ò' => 'o', 'Ó' => 'o', 'Ô' => 'o', 'Ö' => 'o', 'ò' => 'o', 'ó' => 'o', 'ô' => 'o', 'ö' => 'o',
		'Ù' => 'u', 'Ú' => 'u', 'Û' => 'u', 'Ü' => 'u', 'ù' => 'u', 'ú' => 'u', 'û' => 'u', 'ü' => 'u', 'µ' => 'u',
		'Œ' => 'oe', 'œ' => 'oe',
		'$' => 's');
 
	$string = strtr($string, $caracteres);
	$string = preg_replace('#[^A-Za-z0-9]+#', '-', $string);
	$string = trim($string, '-');
	$string = strtolower($string);
 
	return $string;
}

function is_submited($type){
	if($type == '_POST'){
		if( count($_POST) > 0)
			return true;
		else
			return false;
	}
	else{
		if( count($_GET) > 0)
			return true;
		else
			return false;
	}
}

function wd_remove_accents($str, $charset='utf-8')
{
    $str = htmlentities($str, ENT_NOQUOTES, $charset);
    
    $str = preg_replace('#&([A-za-z])(?:acute|cedil|caron|circ|grave|orn|ring|slash|th|tilde|uml);#', '\1', $str);
    $str = preg_replace('#&([A-za-z]{2})(?:lig);#', '\1', $str); // pour les ligatures : '&oelig;'
    $str = preg_replace('#&[^;]+;#', '', $str); // supprime les autres caractères
    
    return $str;
}