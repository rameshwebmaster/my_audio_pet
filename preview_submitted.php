<?php

// error_reporting(E_ALL);
// ini_set('display_errors', 1);
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>MyAudioPet</title>
<!-- BOOTSTRAP STYLES-->
<link href="admin/assets/css/bootstrap.css" rel="stylesheet" />
<!-- FONTAWESOME STYLES-->
<link href="admin/assets/css/font-awesome.css" rel="stylesheet" />
<!--CUSTOM BASIC STYLES-->
<link href="admin/assets/css/basic.css" rel="stylesheet" />
<!--CUSTOM MAIN STYLES-->
<link href="admin/assets/css/custom.css" rel="stylesheet" />
<!-- GOOGLE FONTS-->
<link href='admin/assets/css/css_49de5eb8.css' rel='stylesheet' type='text/css' />
<!--bootstrap-wysihtml5-->
<style type="text/css">
#page-inner {
	width: 98%;
	margin: 7px 16px 3px 0px;
	background-color: #fff!important;
	padding: 10px;
	min-height: 610px;
}
</style>
</head>
<body>
<div id="page">
  <div id="page-inner">
  <img src="http://02ced71.netsolhost.com/myaudiopet/header-img.jpg" width="100%" height="" alt="" class="img-responsive" />
    <div class="row col-md-8" style="margin-left:185px">
      <div class="col-md-8">
      
         <div class="alert alert-success div-responsive">
             <strong>Your Certificate</strong> has been created a successfully!!.
         </div>
      </div>
    </div>
    <!-- /. ROW  -->
    <div class="row col-md-8">
      <div class="col-md-12" style="margin-left:200px">
        <div class="panel panel-info">
        
          <div class="panel-body">
            <form id="adminLogin" action="includes/save_certificate.php" autocomplete="Off" method="post" class="signin-form" enctype="multipart/form-data">
              <input type="hidden" name="do_action" value="submit_email">
               <input type="hidden" name="id" value="<?php if(isset($_GET['entry_id']) && !empty($_GET['entry_id']) )echo $_GET['entry_id']; ?>">
              <div class="form-group">
                  <label>Email Address</label>
                  <input class="form-control" type="email" name="email_address" placeholder="Enter email address" value="">
                </div>
                <button type="submit" class="btn btn-primary" id="cmdSave" name="preview"> Submit </button>
                   <?php if(isset($_GET['entry_id']) && !empty($_GET['entry_id']) ):  
				     $this_id = $_GET['entry_id'];?>
				    <a href="preview.php?entry_id=<?php echo $this_id; ?>" target="_blank">
					<button type="button" class="btn btn-primary" id="prv" name="preview" style="margin-right:10px;"> Preview Certificate </button></a>
				   
              
              <?php endif; ?> 
           </form>
          </div>
        </div>
      
    </div>
  
  <!-- /. PAGE INNER  -->
</div>
<!-- /. WRAPPER  -->
<!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
<!-- JQUERY SCRIPTS -->
<script src="admin/assets/js/jquery-1.10.2.js"></script>
<!-- BOOTSTRAP SCRIPTS -->
<script src="admin/assets/js/bootstrap.js"></script>
<!-- METISMENU SCRIPTS -->
<script src="admin/assets/js/jquery.metisMenu.js"></script>
<!-- CUSTOM SCRIPTS -->
<script src='admin/assets/js/jquery.min.js'></script>
<script type='text/javascript' src='admin/assets/js/jquery.form.js'></script>
<script src='admin/assets/js/bootstrap-filestyle.min.js'></script>


</body>
</html>
