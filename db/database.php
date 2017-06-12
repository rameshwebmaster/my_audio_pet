<?php
/*---------------------------------------------------------------------------------------
|    			Application developed by Amin Dad Shah  								|
|               Email address : amindadshah@gmail.com   		 						|
|               Mobile Number : 0333-9276635            		 						|	  
----------------------------------------------------------------------------------------*/
  // Db Connection file
  define('SERVER', 			'localhost');
  define('DB_USER', 		'root');
  define('DB_PASS', 		'ac3r');
  define('DB_NAME',    		'askforpr_jonny');
    
// Function to include database connection
function connect_db(){
	$mysqli_obj = new mysqli();
	$mysqli_obj->connect(SERVER, DB_USER, DB_PASS, DB_NAME);
	return $mysqli_obj;
}

// Close connection
function close_db(){
	$con = connect_db();
	mysqli_close($con);
}

//date_default_timezone_set('Asia/Karachi');
?>
