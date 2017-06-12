<?php
// error_reporting(E_ALL);
// ini_set('display_errors', 1);

/*---------------------------------------------------------------------------------------
|    			Application developed by Amin Dad Shah  								|
|               Email address : amindadshah@gmail.com   		 						|
|               Mobile Number : 0333-9276635            		 						|	  
----------------------------------------------------------------------------------------*/
// Include all required files



include('../common.php');

 
 // $UploadDir = "../uploads/";
 // $UploadThumbDir = "../uploads/thumbs/";

if(isset($_POST) && !empty($_POST)){

    $action = $_POST['do_action'];
  
   
// settings
  if($action == 'form_values'){
   
	 $first_name = input($_POST['first_name']);
	 $last_name = input($_POST['last_name']);
	 $have_pet = input($_POST['have_pet']);
	 $pet_name = input($_POST['pet_name']);
	$city = input($_POST['city']);	
	$state = input($_POST['state']);		

	 // Check for validation
	
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
			}else if(empty($city)){
			     echo error("Please enter your city name");
		     scroll();
				 exit();
			}else if(empty($state)){
			     echo error("Please enter your state name");
		     scroll();
				 exit();
			}
		


	 
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
										  city = '".$city."',
										  state = '".$state."',
										 is_subscribed = '".$is_subscribed."',
										  created_at = '".created_at()."'
                                          "); 
		 
		 //  echo success("Data saved successfully.");
		   
		   $_SESSION['last_id'] = $last_id;
		   	scroll();
			go_to_page('./preview_submitted.php?entry_id='.$last_id);			
		  }		  
		  
		  
	}
  
	if($action == 'submit_email'){

		  $email_address = input($_POST['email_address']); 
		  $entry_id = input($_POST['id']);	
		 
		
		 if(empty($email_address)){
		     echo error("Please enter your email address ");
             scroll();
			 exit();
		}else if(!empty($email_address) && false == is_valid_email($email_address)){
		 
		     echo error("Please enter valid email address");
             scroll();
			
		}else{
			   if(!isset($entry_id) && empty($entry_id)){
			 // First check for duplicate entries based on email
			 $sql_check = execute_query("SELECT email_address FROM ".USERS." WHERE email_address='".$email_address."' ");
		     $row_cat = num_rows($sql_check);
			 if($row_cat > 0){
			    echo error("Email already exist. Use another email address.");
				scroll();   
				} 
			}
		
			$last_id = execute_query("UPDATE  ".USERS." 
                                          SET 
                                          email_address = '".$email_address."',
                                          is_subscribed = 'Y'
										  WHERE id=".$entry_id."
                                          ");

            echo success("Data updated successfully.");
		     go_to_page('./thank_you.php');                    
		}
  

 	}
  
}

?>
