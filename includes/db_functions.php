<?php 
/*---------------------------------------------------------------------------------------
|    			                      Application developed by Amin Dad Shah  								|
|                               Email address : amindadshah@gmail.com   		 						|
|                               Mobile Number : 0333-9276635            		 						|	  
----------------------------------------------------------------------------------------*/

/** Db related functions **/

// Return table data as array
function fetch_array($query){
	return mysqli_fetch_array($query);
}

// Return result row as an object
function fetch_object($query){
	return mysqli_fetch_object($query);
}

// Return table data as object
function fetch_assoc($query){
	return mysqli_fetch_assoc($query);
}

// Return number of rows
function num_rows($query){
	return mysqli_num_rows($query);
}


// Return single row as an associative array
function get_single_row($table, $where){
    $mysqli_obj = connect_db();
	$tbl_data = $mysqli_obj->query("SELECT * FROM $table WHERE $where");
    $row = fetch_assoc($tbl_data);
	$array[] = $row;
	return $array;
}

// Return single row as an associative array using single sql query
function get_query_data($sql){
    $mysqli_obj = connect_db();
   $tbl_data = $mysqli_obj->query($sql);
   $row = fetch_assoc($tbl_data);
   $array[] = $row;
  return $array;
}

// Return multiple rows as an associative array
function get_table_rows($table, $where){
    $mysqli_obj = connect_db();
	$tbl_data = $mysqli_obj->query("SELECT * FROM $table WHERE $where");
    while($row = fetch_assoc($tbl_data)){
      $array[] = $row;
    }
	return $array;
}


// Return multiple column rows as an associative array
function get_columns($columns, $table, $where){
    $mysqli_obj = connect_db();
  $tbl_data = $mysqli_obj->query("SELECT $columns FROM $table WHERE $where");
    while($row = fetch_array($tbl_data)){
      $array[] = $row;
    }
  return $array;
}

// Return single column as an associative array
function get_single_column($column,$table, $where){
	$mysqli_obj = connect_db();
	$tbl_data = $mysqli_obj->query("SELECT $column FROM $table WHERE $where");
    $row = fetch_assoc($tbl_data);	
    $array[] = $row;
	return $array;

}

// Return 1 if data exists
function check_single_column($column,$table, $where){
  $mysqli_obj = connect_db();
  $tbl_data = $mysqli_obj->query("SELECT $column FROM $table WHERE $where");
  if(num_rows($tbl_data) > 0){
    return 1;
  }else{
    return 0;
  }  


}

// Display column directly
function display($column, $table, $where){
  $db = connect_db();
  $query = $db->query("SELECT $column FROM $table WHERE $where");
  $row = fetch_assoc($query);
  return $row[$column];
}


// Check login credentials
function check_login_credentials($username, $password){
	$class_obj = connect_db();
	$login_data = $class_obj->query("SELECT * FROM ".ADMIN." WHERE username='".$username."' AND password='".$password."'");
    if($row = fetch_object($login_data)){
    	 @session_start();
    	 $_SESSION['admin_id'] = $row->id;
       $_SESSION['admin_username'] = $row->username;
       echo redirect('./');
    }else{
        echo error('Authentication failed. Try again.');
    }   
}

// Delete Data
function delete_data($table, $where){
    $db = connect_db();
	
    $delete_data = $db->query("DELETE FROM $table WHERE $where");
}


// Function to execute query
function execute_query_get_id($sql){
    $mysqli_obj = connect_db();
    $mysqli_obj->query("$sql");
    return mysqli_insert_id($mysqli_obj);
}

function execute_query($sql){
    $mysqli_obj = connect_db();
    $data = $mysqli_obj->query("$sql");
    return $data;
}





// Find total number of records in a table
function find_total($table, $where){
	$mysqli_boject = connect_db();
	$query_data = $mysqli_boject->query("SELECT COUNT(*) AS num FROM $table WHERE $where");
   $total_records = fetch_assoc($query_data);
   return $total_records['num'];
}


// Find total number of records in a table
function find_sum($column,$table, $where){
  $mysqli_boject = connect_db();
  $query_data = $mysqli_boject->query("SELECT SUM($column) AS num FROM $table WHERE $where");
   $total_records = fetch_assoc($query_data);
   return $total_records['num'];
}

// Get all columns
 function get_all_columns(){
  // Get all columns
  $columns = execute_query("SELECT column_name FROM ".COLS." ");
  $all_columns = '';
  while($row_get_column = fetch_object($columns)){
  $col = $row_get_column->column_name;  
  $remove_underline = str_replace('_',' ',$row_get_column->column_name);
  $new_column = ucwords($remove_underline);
   if($new_column == 'Id' || $col == "certificate_status" || $col == "certificate_issued_date" || $col == "image" || $col == "parent_telephone" || $col == "parent_mobile" )
    continue;
   $all_columns .= '<option value="'.stripslashes($row_get_column->column_name).'" >'.stripslashes($new_column).'</option>';
   } 
   echo $all_columns;
}


?>