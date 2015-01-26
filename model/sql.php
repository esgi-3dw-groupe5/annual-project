<?php
require_once('dbconnect');
function find($table, $arg = null){
	// Establish connection to database
	$link = db_connect();

	// Create the query
	if($table === null){

	}
		$query	= sprintf("SELECT * FROM %s", $table);
	else{
		$query	= sprintf("SELECT * FROM %s WHERE", $table);

	// If the arg array is not null, foreach the array and concat argument
		$query .= " "
		if( count($art) > 1 ){
			foreach ($arg as $key => $value) {
				$query .= sprintf("AND :%s = %s", $key, $value);
			}
		}
	}	


}