<?php
/*---------------------------------------------------------------------------------------
|    			Application developed by Amin Dad Shah  								|
|               Email address : amindadshah@gmail.com   		 						|
|               Mobile Number : 0333-9276635            		 						|	  
----------------------------------------------------------------------------------------*/
// Include all required files
include('../common.php');

 $UploadDir = "../uploads/";
 $UploadThumbDir = "../uploads/thumbs/";
if(isset($_POST) && !empty($_POST)){

    $action = $_POST['do_action'];
    // login
    if($action == 'login'){
    	 $user_name = input($_POST['admin_username']);
    	 $password  = input($_POST['admin_password']);
    	 // Check for empty values
    	 if(empty($user_name)){
    	 	echo error('Please enter your username.');
    	 }else if(empty($password)){
    	 	echo error('Please enter your password.');
    	 }else{
            // Check for data if exist
            check_login_credentials($user_name, md5($password));
           
    	 }

    }

// settings
  if($action == 'form_values'){
     //dd($_POST);
	 $entry_id = input($_POST['id']);
     $over_18 = input($_POST['over_18']);
	 $under_18 = input($_POST['under_18']);
	 $first_name = input($_POST['first_name']);
	 $last_name = input($_POST['last_name']);
	 $have_pet = input($_POST['have_pet']);
	 $pet_name = input($_POST['pet_name']);
	 $line_1 = input($_POST['line_1']);
	 $line_2 = input($_POST['line_2']);
	 $city = input($_POST['city']);
	 $state = input($_POST['state']);
	 $zip_code = input($_POST['zip_code']);
	 $country = input($_POST['country']);
	 $email_address = input($_POST['email_address']); 
	 $phone_number = input($_POST['phone_number']); 
	 $is_subscribed = input($_POST['is_subscribed']); 
	 $state_drop = input($_POST['state_drop']); 
	 if($country == 'United States'){
	    $state = $state_drop;
	 }else{
	    $state = $state;
	 }
	 // Check for validation
	 if( empty($first_name) || empty($last_name) ){
       echo error("Please fill the form");
       scroll();
       exit();
	   }else{
	      if(empty($first_name)){
		     echo error("Please enter your first name");
             scroll();
			 exit();
		  }else if(empty($last_name)){
		     echo error("Please enter your last name");
             scroll();
			 exit();
		}else if(empty($have_pet)){
		     echo error("Please select which pet do you have?");
             scroll();
			 exit();
		}else if(empty($pet_name)){
		     echo error("Please enter the name you want to give your new Pet");
             scroll();
			 exit();
		}else if(empty($line_1)){
		     echo error("Please enter your line 1 address");
             scroll();
			 exit();
		}else if(empty($city)){
		     echo error("Please enter your city name");
             scroll();
			 exit();
		}
		/*else if(empty($state)){
		     echo error("Please enter your state name");
             scroll();
			 exit();
		}
		*/else if(empty($country)){
		     echo error("Please select your country name");
             scroll();
			 exit();
		}else if(empty($email_address)){
		     echo error("Please enter your email address ");
             scroll();
			 exit();
		}else if(!empty($email_address) && false == is_valid_email($email_address)){
		     echo error("Please enter valid email address");
             scroll();
			 exit();
		}else{
	   if(!isset($entry_id) && empty($entry_id)){
	 // First check for duplicate entries based on email
	 $sql_check = execute_query("SELECT email_address FROM ".USERS." WHERE email_address='".$email_address."' ");
     $row_cat = num_rows($sql_check);
	 if($row_cat > 0){
	    echo error("Email already exist. Use another email address.");
		scroll();   
	} }else{
	     if(empty($over_18)){
		   $over_18 = 'N';
		 }
		 if(empty($under_18)){
		   $under_18 = 'N';
		 }
		 if(empty($is_subscribed)){
		   $is_subscribed = 'N';
		 }
		 
		  if(!isset($entry_id) || empty($entry_id)){
	     $last_id = execute_query_get_id("INSERT INTO ".USERS." 
                                          SET 
                                          over_18 = '".$over_18."',
										  under_18 = '".$under_18."',
										  first_name = '".$first_name."',
										  last_name = '".$last_name."',
										  have_pet = '".$have_pet."',
										  pet_name = '".$pet_name."',
										  line_1 = '".$line_1."',
										  line_2 = '".$line_2."',
										  city = '".$city."',
										  state = '".$state."',
										  zip_code = '".$zip_code."',
										  country = '".$country."',
										  email_address = '".$email_address."',
										  phone_number = '".$phone_number."',
										  is_subscribed = '".$is_subscribed."',
										  created_at = '".created_at()."'
                                          "); 
		 
		   echo success("Data saved successfully.");
		   
		   $_SESSION['last_id'] = $last_id;
		   scroll();
		   go_to_page('./index.php?entry_id='.$last_id);			
		  }else{
		     $last_id = execute_query("UPDATE  ".USERS." 
                                          SET 
                                          over_18 = '".$over_18."',
										  under_18 = '".$under_18."',
										  first_name = '".$first_name."',
										  last_name = '".$last_name."',
										  have_pet = '".$have_pet."',
										  pet_name = '".$pet_name."',
										  line_1 = '".$line_1."',
										  line_2 = '".$line_2."',
										  city = '".$city."',
										  state = '".$state."',
										  zip_code = '".$zip_code."',
										  country = '".$country."',
										  email_address = '".$email_address."',
										  phone_number = '".$phone_number."',
										  is_subscribed = '".$is_subscribed."',
										  created_at = '".created_at()."'
										  WHERE id=".$entry_id."
                                          "); 
			 echo success("Data updated successfully.");
		   scroll();
		    go_to_page('./index.php?entry_id='.$_SESSION['last_id']);												  
		  }					  
		  
		  
		 					  
         }     
	 }		  
        
  }                              
  
   } 

  
// Delete data
  if($action == 'deleteData'){
    $UploadDir = "../uploads/";
    $UploadThumbDir = "../uploads/thumbs/";
    $id = $_POST['id'];
    $tbl = $_POST['tbl'];
    // Now put logic for different tables
      if($tbl == USERS){
        delete_data(USERS, 'id='.$id);
        echo success('Data deleted successfully.');
        scroll();
      }

    
  }

    
}
?>