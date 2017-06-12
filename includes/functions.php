
<?php 
/*---------------------------------------------------------------------------------------
|    			                      Application developed by Amin Dad Shah  								|
|                               Email address : amindadshah@gmail.com   		 						|
|                               Mobile Number : 0333-9276635            		 						|	  
----------------------------------------------------------------------------------------*/



// Function redirect
function redirect($url){
  $script = "<script type='text/javascript'>window.location.href='".$url."'</script>";
  return $script;
  exit();
}


/** General Purpose Functions**/

// Form Action
function form_action($action){
  return "../includes/process_actions.php?do_action=".$action;
}

// Evaluate script for form to work
function evaluate_form_script($form_id, $button_id, $output_div_id){
  return "<script src='".INC_JS."/jquery.min.js'></script>
          <script type='text/javascript' src='".INC_JS."/jquery.form.js'></script>
          <script src='".INC_JS."/bootstrap-filestyle.min.js'></script>
           <script src='".INC_JS."/select2.js'></script>
            <link rel='stylesheet' type='text/css' href='".INC_CSS."/select2.css'/>
            <link rel='stylesheet' type='text/css' href='".INC_CSS."/select2-bootstrap.css'/>
                    <script type='text/javascript'>
        			$(document).ready(function()
        			{
        				$('#".$form_id."').on('submit', function(e)
        				{
        					e.preventDefault();
        					$('#".$button_id."').attr('disabled', ''); 
        					/* disable upload button
        					 show uploading message
        					$('#".$output_div_id."').html('<div class='alert alert-info' role='alert'>Submitting.. Please wait..</div>');
        					*/
                  
                  $('#".$output_div_id."').html('<div >Submitting.. Please wait..</div>');
        					$(this).ajaxSubmit({
        					target: '#".$output_div_id."',
        					success:  afterSuccess //call function after success
        					});
        				});
        			});
        			 
        			function afterSuccess()
        			{	
        				 
        				$('#".$button_id."').removeAttr('disabled'); //enable submit button
        			   
        			}
        			
        			$(function(){
        			
        			$(':file').filestyle({iconName: 'glyphicon-picture', buttonText: 'Select Photo'});
        			
        			});
        			</script>";
			
}

// Javascript for delete on listing pages
function Listing_page_javascript($output_div, $table){
  echo "<script src='assets/js/jquery.min.js'></script>
          <script type='text/javascript' >
          $(function() {
          $('.delbutton').click(function(){
          var del_id = $(this).attr('id');
          var tbl = '".$table."';
          var info = 'id=' + del_id+'&tbl='+ tbl+'&do_action=deleteData';
          if( confirm('Sure you want to delete this record? There is NO undo!') )
          {
          $.ajax({
          type: 'POST',
          url: '../includes/process_actions.php',
          data: info,
          dataType: 'html',
          success: function(data) {
          $('#".$output_div."').html(data);
          }

          });
          $(this).parents('.gradeX').animate({ backgroundColor: 'red' }, 'fast')
          .animate({ opacity: 'hide' }, 'slow');
          }
          return false;
          });

          });

          </script>";
}

// Check if the user is logged in or not
function check_login(){
	 if(!isset($_SESSION['admin_id'])){
	  header("Location: login.php");
	  exit();
	}
}

/** Functions about Messages  **/

// Success message
function success($message){
	return SUCESS_DIV_SATART.$message.MESSAGE_DIV_END;
}
// Error message
function error($message){
	return ERROR_DIV_SATART.$message.MESSAGE_DIV_END;
}


/*---------------------- Function for pagination ---------------------------*/
  
     
     
      function apply_pagination($page, $limit, $total_pages, $params=''){
             $adjacents = 3;    
             /* Setup page vars for display. */
            if ($page == 0) $page = 1;					//if no page var is given, default to 1.
            $prev = $page - 1;							//previous page is page - 1
            $next = $page + 1;							//next page is page + 1
            $lastpage = ceil($total_pages/$limit);		//lastpage is = total pages / items per page, rounded up.
            $lpm1 = $lastpage - 1;						//last page minus 1
            
            /* 
                  Now we apply our rules and draw the pagination object. 
                  We're actually saving the code to a variable in case we want to draw it more than once.
            */
            $pagination = "";
            if($lastpage > 1)
            {	
                  $pagination .= "<ul class=\"pagination\">";
                  //previous button
                  if ($page > 1) 
                        $pagination.= "<li class=\"paginate_button previous\" aria-controls=\"dataTables-example\" tabindex=\"0\" id=\"dataTables-example_previous\"><a href=\"$targetpage?page=$prev&$params\">Previous</a></li>";
                  else
                        $pagination.= "<li class=\"paginate_button previous disabled\" aria-controls=\"dataTables-example\" tabindex=\"0\" id=\"dataTables-example_previous\"><a href=\"javascript:void(0)\">Previous</a></li>";	
                  
                  //pages	
                  if ($lastpage < 7 + ($adjacents * 2))	//not enough pages to bother breaking it up
                  {	
                        for ($counter = 1; $counter <= $lastpage; $counter++)
                        {
                              if ($counter == $page)
                                    $pagination.= "<li class=\"paginate_button active\" aria-controls=\"dataTables-example\" tabindex=\"0\"><a href=\"$targetpage?page=$counter&$params\">$counter</a></li>";
                              else
                                    $pagination.= "<li class=\"paginate_button \" aria-controls=\"dataTables-example\" tabindex=\"0\"><a href=\"$targetpage?page=$counter&$params\">$counter</a></li>";					
                        }
                  }
                  elseif($lastpage > 5 + ($adjacents * 2))	//enough pages to hide some
                  {
                        //close to beginning; only hide later pages
                        if($page < 1 + ($adjacents * 2))		
                        {
                              for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
                              {
                                    if ($counter == $page)
                                          $pagination.= "<li class=\"paginate_button active\" aria-controls=\"dataTables-example\" tabindex=\"0\"><a href=\"$targetpage?page=$counter&$params\">$counter</a></li>";
                                    else
                                          $pagination.= "<li class=\"paginate_button \" aria-controls=\"dataTables-example\" tabindex=\"0\"><a href=\"$targetpage?page=$counter&$params\">$counter</a></li>";					
                              }
                              $pagination.= "<li class=\"paginate_button \" aria-controls=\"dataTables-example\" tabindex=\"0\"><a href=\"#\">...</a></li>";
                              $pagination.= "<li class=\"paginate_button \" aria-controls=\"dataTables-example\" tabindex=\"0\"><a href=\"$targetpage?page=$lpm1&$params\">$lpm1</a></li>";
                              $pagination.= "<li class=\"paginate_button \" aria-controls=\"dataTables-example\" tabindex=\"0\"><a href=\"$targetpage?page=$lastpage&$params\">$lastpage</a></li>";		
                        }
                        //in middle; hide some front and some back
                        elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
                        {
                              $pagination.= "<li class=\"paginate_button \" aria-controls=\"dataTables-example\" tabindex=\"0\"><a href=\"$targetpage?page=1&$params\">1</a></li>";
                              $pagination.= "<li class=\"paginate_button \" aria-controls=\"dataTables-example\" tabindex=\"0\"><a href=\"$targetpage?page=2&$params\">2</a></li>";
                              $pagination.= "<li class=\"paginate_button \" aria-controls=\"dataTables-example\" tabindex=\"0\"><a href=\"#\">...</a></li>";
                              for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
                              {
                                    if ($counter == $page)
                                          $pagination.= " <li class=\"paginate_button active\" aria-controls=\"dataTables-example\" tabindex=\"0\"><a href=\"$targetpage?page=$counter&$params\">$counter</a></li>";
                                    else
                                          $pagination.= "<li class=\"paginate_button \" aria-controls=\"dataTables-example\" tabindex=\"0\"><a href=\"$targetpage?page=$counter&$params\">$counter</a></li>";					
                              }
                              $pagination.= "<li class=\"paginate_button \" aria-controls=\"dataTables-example\" tabindex=\"0\"><a href=\"#\">...</a></li>";
                              $pagination.= "<li class=\"paginate_button \" aria-controls=\"dataTables-example\" tabindex=\"0\"><a href=\"$targetpage?page=$lpm1&$params\">$lpm1</a></li>";
                              $pagination.= "<li class=\"paginate_button \" aria-controls=\"dataTables-example\" tabindex=\"0\"><a href=\"$targetpage?page=$lastpage&$params\">$lastpage</a></li>";		
                        }
                        //close to end; only hide early pages
                        else
                        {
                              $pagination.= "<li class=\"paginate_button \" aria-controls=\"dataTables-example\" tabindex=\"0\"><a href=\"$targetpage?page=1&$params\">1</a></li>";
                              $pagination.= "<li class=\"paginate_button \" aria-controls=\"dataTables-example\" tabindex=\"0\"><a href=\"$targetpage?page=2&$params\">2</a></li>";
                              $pagination.= "<li class=\"paginate_button \" aria-controls=\"dataTables-example\" tabindex=\"0\"><a href=\"#\">...</a></li>";
                              for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
                              {
                                    if ($counter == $page)
                                          $pagination.= "<li class=\"paginate_button active\" aria-controls=\"dataTables-example\" tabindex=\"0\"><a href=\"$targetpage?page=$counter&$params\">$counter</a></li>";
                                    else
                                          $pagination.= "<li class=\"paginate_button \" aria-controls=\"dataTables-example\" tabindex=\"0\"><a href=\"$targetpage?page=$counter&$params\">$counter</a></li>";					
                              }
                        }
                  }
                  
                  //next button
                  if ($page < $counter - 1) 
                        $pagination.= " <li class=\"paginate_button next\" aria-controls=\"dataTables-example\" tabindex=\"0\" id=\"dataTables-example_next\"><a href=\"$targetpage?page=$next&$params\">Next</a></li>";
                  else
                        $pagination.= " <li class=\"paginate_button next disabled\" aria-controls=\"dataTables-example\" tabindex=\"0\" id=\"dataTables-example_next\"><a href=\"javascript:void(0)\">Next</a></li>";
                  $pagination.= "</ul>";		
            }
              return $pagination;
    }

/* Create Thumbnail Function*/
function createthumb($sourcefile,$destfile,$filename,$new_w,$new_h){
      $system=explode('.',$filename);
      
      if (preg_match('/jpg|jpeg|JPG|JPEG/',$system[1])){
        $src_img=imagecreatefromjpeg($sourcefile);
      }
      if (preg_match('/gif|GIF/',$system[1])){
        $src_img=imagecreatefromgif($sourcefile);
      }
      if (preg_match('/png|PNG/',$system[1])){
        $src_img=imagecreatefrompng($sourcefile);
                        
      }
      $old_x=imagesx($src_img);
      $old_y=imagesy($src_img);
      
      $thumb_w=$new_w;
      $thumb_h=$new_h;

      $dst_img=imagecreatetruecolor($thumb_w,$thumb_h);
                  $color =imagecolorallocate($dst_img,255,255,255);
                   imagefill($dst_img, 0, 0, $color);
      imagecopyresampled($dst_img,$src_img,0,0,0,0,$thumb_w,$thumb_h,$old_x,$old_y); 
      if (preg_match("/gif|GIF/",$system[1]))
      {
        imagegif($dst_img,$destfile); 
      } 
      else if(preg_match("/png|PNG/",$system[1]))
      {
        imagepng($dst_img,$destfile,9); 
      } 
      else {
        imagejpeg($dst_img,$destfile,100); 
      }
      imagedestroy($dst_img); 
      imagedestroy($src_img); 
    }

 /** Display different labels **/

// primary lable
 function primary_label($value){
 	return "<span class='label label-primary'>".$value."</span>";
 }   

 // Default
 function default_label($value){
 	return "<span class='label label-default1'>".$value."</span>";
 }

 // Success label
 function success_label($value){
 	return "<span class='label label-success'>".$value."</span>";
 }

 // info label
 function info_label($value){
 	return "<span class='label label-info'>".$value."</span>";
 }

// Warning label
 function Warning_label($value){
 	return "<span class='label label-warning'>".$value."</span>";
 }

 // Danger label
 function danger_label($value){
 	return "<span class='label label-danger'>".$value."</span>";
 }




// Display pagination if no of pages are greater
 function display_pagination($show_pagination){
 	echo '<div class="">
		    <div class="row">
		      <div class="col-md-12">
		        <ul class="" style="text-align: center; padding: 0px ! important; list-style:none">
		          <li >'.$show_pagination.'</li>
		        </ul>
		      </div>
		    </div>
		  </div>';
 }

 /** Encryption & Decryption **/
 function encrypt($value){
 	return base64_encode($value);
 }

 function decrypt($value){
 	return base64_decode($value);
 }


/**  Javascript goes here**/
function reset_form($form_id){
   return "<script type='text/javascript'>
          $( '#".$form_id."' ).each(function(){
           this.reset();
        });
         </script>
        ";
}

/**  Javascript goes here**/
function reset_form_inputs($form_id){
   return "<script type='text/javascript'>
          $( '#".$form_id."' ).find('input:text').val('');
         </script>
        ";
}

function animate($div){
   return "<script type='text/javascript'>
          $( '#".$div."' ).SlideUp{});
         </script>
        ";
}


/** Submit button **/
function form_buttons(){
  echo    '<button type="submit" class="btn btn-primary" id="cmdSave"> Submit </button>
                  <button type="button" class="btn btn-default" onclick="history.back(-1);">Cancel </button>';
}

// Striplashes
function strip($value){
  return stripslashes(strip_tags($value));
}

// Addslashes
function input($data){
 // return trim(addslashes($value));
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}




// Upload errors
function upload_errors($err_code) {
  switch ($err_code) { 
        case UPLOAD_ERR_INI_SIZE: 
            return 'The uploaded file exceeds the upload_max_filesize directive in php.ini'; 
        case UPLOAD_ERR_FORM_SIZE: 
            return 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form'; 
        case UPLOAD_ERR_PARTIAL: 
            return 'The uploaded file was only partially uploaded'; 
        case UPLOAD_ERR_NO_FILE: 
            return 'No file was uploaded'; 
        case UPLOAD_ERR_NO_TMP_DIR: 
            return 'Missing a temporary folder'; 
        case UPLOAD_ERR_CANT_WRITE: 
            return 'Failed to write file to disk'; 
        case UPLOAD_ERR_EXTENSION: 
            return 'File upload stopped by extension'; 
        default: 
            return 'Unknown upload error'; 
    } 
} 


// Scroll to Top of the page
function scroll(){
  echo "<script type='text/javascript'>
                    $('html, body').animate({scrollTop:0}, 'slow'); 
                   </script>"; 
}
  

// Date format like YYYY-mm-dd
 function date_formate($date){
   if(!empty($date)){
     $date = explode("-", $date);
     return $date[2].'-'.$date[1].'-'.$date[0];
   }
     
 }

 // Date format like dd/mm/YYYY
 function date_formate_2($date){
   if(!empty($date) && $date != '0000-00-00'){
    $date = explode("-", $date);
     return $date[2].'/'.$date[1].'/'.$date[0];
   }
     
 }

 // Date format like dd-mm-YYYY
 function display_date_formate($date){
   if(!empty($date)){
     $date = explode("-", $date);
     return $date[0].'/'.$date[1].'/'.$date[2];
   }
     
 }


// Redirect via javascript
function go_to_page($page_name){
  $script = '<script type="text/javascript">';
  $script .= 'function redirect(){';
  $script .= 'window.location = "'.SITE.'/'.$page_name.'"';
  $script .= '}';
  $script .= 'setTimeout("redirect();", 1000);
         </script>';
 echo $script;     
}


// Human readable date time format
function dtime_format($datetime){
  if( !empty($datetime) ){
     $now = $datetime;
     $date_time = strtotime($now);
     //return $dt_formate = date("D, jS M, Y @ h:i A", $date_time);
     return $dt_formate = date("D, jS M", $date_time);
  }
   
}

// Human readable date time format
function dttime_format($datetime){
  if( !empty($datetime) ){
     $now = $datetime;
     $date_time = strtotime($now);
     //return $dt_formate = date("D, jS M, Y @ h:i A", $date_time);
     return $dt_formate = date("D, jS M, Y", $date_time);
  }
   
}

function date_time_format($datetime){
  if( !empty($datetime) ){
     $now = $datetime;
     $date_time = strtotime($now);
     return $dt_formate = date("D, jS M, Y @ h:i s A", $date_time);
  }
   
}

function humanTiming1($app_date_time){
  $app_date_time = strtotime($app_date_time);
  return $formated_app_date_time = date("M jS, y", $app_date_time);
}

function humanTiming ($time)
{

    $time = time() - $time; // to get the time since that moment
    $time = ($time<1)? 1 : $time;
    $tokens = array (
        31536000 => 'year',
        2592000 => 'month',
        604800 => 'week',
        86400 => 'day',
        3600 => 'hour',
        60 => 'minute',
        1 => 'second'
    );

    foreach ($tokens as $unit => $text) {
        if ($time < $unit) continue;
        $numberOfUnits = floor($time / $unit);
        return $numberOfUnits.' '.$text.(($numberOfUnits>1)?'s':'');
    }

}

// Placeholder function
function palceholder($text){
  echo 'placeholder="'.$text.'"';
}

function dd($array){
  echo '<pre>';
  print_r($array);
  echo '</pre>';
  exit();
}

function is_valid_email($email){
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
     return false;
  }else{
    return true;
  }
}

function is_only_charactors($input_value){
  if (!preg_match("/^[a-zA-Z ]*$/",$input_value)) {
     return false;
  }else{
    return true;
  }
}


function is_valid_url($url){
  if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$url)) {
       return false;
    }else{
	   return true;
	}
} 

function created_at(){
  return date('Y-m-d h:i:s');
}

?>