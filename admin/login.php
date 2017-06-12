<?php include_once('../common.php');?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<!-- Original URL: http://binarytheme.com/BTlivedemos/2014/09/16/advance-admin/login.html
Date Downloaded: 12/1/2015 6:38:52 PM !-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Admin Login</title>
<!-- BOOTSTRAP STYLES-->
<link href="assets/css/bootstrap.css" rel="stylesheet" />
<!-- FONTAWESOME STYLES-->
<link href="assets/css/font-awesome.css" rel="stylesheet" />
<!-- GOOGLE FONTS-->
<link href='assets/css/css_49de5eb8.css' rel='stylesheet' type='text/css' />
<?php echo evaluate_form_script(adminLogin, submitButton, output);?>
</head>
<body style="background-color: #E2E2E2;">
<div class="container">
  <div class="row text-center " style="padding-top:150px;">
    <div class="col-md-12"> </div>
  </div>
  <div class="row ">
    <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
      <div class="panel-body">
        <div >
          <div class="panel panel-info">
            <div class="panel-heading"> ADMIN LOGIN </div>
            <div class="panel-body">
              <form id="adminLogin" action="<?php echo form_action();?>" autocomplete="Off" method="post" class="signin-form">
              <input type="hidden" name="do_action" value="login">
             <div id="output"></div>
                <div class="form-group">
                  <label>Username/Email</label>
                  <input class="form-control" type="text" name="admin_username" placeholder="Enter Username/Email">
                </div>
                <div class="form-group">
                  <label>Password</label>
                  <input class="form-control" type="password" name="admin_password" placeholder="Enter Password">
                </div>
                <button type="submit" id="submitButton" class="btn btn-info"> Log In</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>
