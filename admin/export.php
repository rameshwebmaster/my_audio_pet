<?php 
include_once('../common.php');
$con = connect_db();
    $sql_query = "select over_18,
					under_18,
					first_name,
					last_name,
					have_pet,
					pet_name,
					line_1,
					line_2,
					country,
					state,
					city,
					zip_code,
					email_address,
					phone_number,
					is_subscribed,
					DATE(created_at) as created_at from tbl_users";
    $export = $con->query($sql_query);
    
    //$header = '';
$header = 'OVER 18'.",\t";
$header .= 'UNDER 18'.",\t";
$header .= 'First Name'.",\t";
$header .= 'LAST NAME'.",\t";
$header .= 'HAVE PET'.",\t";
$header .= 'PET NAME'.",\t";
$header .= 'ADDRESS LINE 1'.",\t";
$header .= 'ADDRESS LINE 2'.",\t";
$header .= 'COUNTRY'.",\t";
$header .= 'STATE'.",\t";
$header .= 'CITY'.",\t";
$header .= 'ZIP CODE'.",\t";
$header .= 'EMAIL'.",\t";
$header .= 'PHONE'.",\t";
$header .= 'SUBSCRIBED'.",\t";
$header .= 'DATE CREATED'."\t";
//this is where most of the work is done. 
//Loop through the query results, and create 
//a row for each
while( $row = $export->fetch_row() ) {
	$line = '';
	//for each field in the row
	foreach( $row as $value ) {
	  
	  
	  
		//if null, create blank field
		if ( ( !isset( $value ) ) || ( $value == "" ) ){
			$value = ",";
		}
		//else, assign field value to our data
		else {
		
			$value = str_replace( '"' , '""' , $value );
			$value = '"' . $value . '"' . ",";
	
		}
		//add this field value to our row
		
		 $line .= $value;
		
	}
	//trim whitespace from each row
	
	$data .= trim( $line ) . "\n";
	
}
//remove all carriage returns from the data

 $data = str_replace( "\r" , "" , $data );


$file_name = date('ymdhis');

//create a file and send to browser for user to download
header("Content-type: application/vnd.ms-excel");
header("Content-disposition: csv" . date("Y-m-d") . ".csv");
header( "Content-disposition: filename=".$file_name.".csv");
// Output data
echo $header."\n".$data;
?>