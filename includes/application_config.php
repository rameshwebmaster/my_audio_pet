<?php 

/*---------------------------------------------------------------------------------------

|    			Application developed by Amin Dad   									|

|               Email address : amindadshah@gmail.com   		 						|

|               Mobile Number : 0333-9276635            		 						|	  

----------------------------------------------------------------------------------------*/





define('PAGES',                         2);

define('INC_JS',						'assets/js');

define('INC_CSS',						'assets/css');

define('INC_FONTS',						'assets/fonts');

define('INC_IMG',						'assets/img');

define('SITE',                          'http://localhost/my_audio_pet'); //http://askforprogrammers.com/myaudiopetcertificate

define('COL',                            10);

define('PANEL',						    'primary');

define('H',						        200);

define('W',						        200);



$valid = 2;



if($valid == 1){

   $required = "";

}else{

	$required = "required";

}



define('REQ',                            $required);



                               

/* Application messages*/

define('ERROR_DIV_SATART',              '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">× </button>');

define('SUCESS_DIV_SATART',             '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">× </button>');

define('MESSAGE_DIV_END',               '</div>');

define('NO_DATA',                       '<font color="red"><center>No Data Found.</center></font>');



/* Tables of the project */

define('ADMIN',							 'tbl_admin');

define('USERS',				             'tbl_users');





















?>