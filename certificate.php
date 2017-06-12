<?php 
// error_reporting(E_ALL);
// ini_set('display_errors', 1);
// print_r($_SERVER['HTTP_HOST']);
include_once('common.php');
 
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>certificate</title>
<link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet"> 
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

body{
  font-size: 14px;
  margin: 0;
  padding: 0;
}
.wrapper{
  width: 100%;
}
.container{
  max-width: 1100px;
  width: 100%;
  margin: 0 auto;
  padding: 0;
  background-image: url(2017Certificate1.jpg);
  background-size: contain;
  height: 900px;
  background-repeat: no-repeat;
}
.contact-form {
	float: left;
	width: 100%;
	margin: 0 auto;
	padding: 50px 0;    
}
img{
  width: 100%;
}
.contact-section {
  float: left;
  padding: 10px 10%;
  width: 80%;
}
.contact-form .pull-left {
   float: left;
    width: 47%;
    margin-right: 1%;
    text-align: right;
}
.contact-form .pull-right {
	float: left;
    width: 50%;
    text-align: left;
}
.contact-form input[type="text"],.contact-form select,.contact-form textarea,.contact-form input[type="email"],
.contact-form input[type="tel"]{
  border: none;
  color: #FF2D16;
  outline: none; 
  font-weight: 700;
    font-family: 'Josefin Sans', sans-serif;
  background: transparent;
  font-size: 22px;
}
textarea{line-height: 68%;}
input[type="radio"] {
    float: left;
}
input[placeholder], [placeholder], *[placeholder] {
    color: #FF2D16;
}
::-webkit-input-placeholder {color: #FF2D16;}
::-moz-placeholder {color: #FF2D16;}
:-ms-input-placeholder {color: #FF2D16;}
:-moz-placeholder {color: #FF2D16;}

.contact-form p {
  margin: 0;
  padding: 15px 0;
  font-weight: 700;
  font-size: 22px;
  color: #231f20;
  clear: both;
}
.contact-form-inner{
  width: 100%;
  padding: 100px 0 0 0;
  text-align: center;
}
.first-name{
	text-align: right;
}
.first-section{
	text-align: center;
    width: 100%;
    float: left;
 }
.audio-pet{
	width: 14%;
}
.your-pet{
	width: 19%;
}
.adoption-txt{
	font-size: 16px !important;
}
.curved-container {
	position: relative;
	width: 200px;
	margin: auto;
	height: 165px;
	transform: rotate(-72deg);
	-moz-transform: rotate(-72deg);
	-webkit-transform: rotate(-72deg);
	left: -148px;
	top:15px;
}
.curved-container span {
  height: 260px;
  position: absolute;
  width: 20px;
  left: 0;
  top: 0;
  transform-origin: bottom center;
  -moz-transform-origin: bottom center;
  -webkit-transform-origin: bottom center;
  font-size: 54px;
  font-weight: 400;
}
.char0 { transform: rotate(6deg); -moz-transform: rotate(6deg); -webkit-transform: rotate(6deg); }
.char1 { transform: rotate(12deg); -moz-transform: rotate(12deg); -webkit-transform: rotate(12deg); }
.char2 { transform: rotate(18deg); -moz-transform: rotate(18deg); -webkit-transform: rotate(18deg); }
.char3 { transform: rotate(24deg); -moz-transform: rotate(24deg); -webkit-transform: rotate(24deg); }
.char4 { transform: rotate(30deg); -moz-transform: rotate(30deg); -webkit-transform: rotate(30deg); }
.char5 { transform: rotate(36deg); -moz-transform: rotate(36deg); -webkit-transform: rotate(36deg); }
.char6 { transform: rotate(42deg); -moz-transform: rotate(42deg); -webkit-transform: rotate(42deg); }
.char7 { transform: rotate(48deg); -moz-transform: rotate(48deg); -webkit-transform: rotate(48deg); }
.char8 { transform: rotate(54deg); -moz-transform: rotate(54deg); -webkit-transform: rotate(54deg); }
.char9 { transform: rotate(60deg); -moz-transform: rotate(60deg); -webkit-transform: rotate(60deg); }
.char10 { transform: rotate(66deg); -moz-transform: rotate(66deg); -webkit-transform: rotate(66deg); }
.char11 { transform: rotate(72deg); -moz-transform: rotate(72deg); -webkit-transform: rotate(72deg); }
.char12 { transform: rotate(78deg); -moz-transform: rotate(78deg); -webkit-transform: rotate(78deg); }
.char13 { transform: rotate(84deg); -moz-transform: rotate(84deg); -webkit-transform: rotate(84deg); }
.char14 { transform: rotate(90deg); -moz-transform: rotate(90deg); -webkit-transform: rotate(90deg); }
.char15 { transform: rotate(96deg); -moz-transform: rotate(96deg); -webkit-transform: rotate(96deg); }
.char16 { transform: rotate(102deg); -moz-transform: rotate(102deg); -webkit-transform: rotate(102deg); }
.char17 { transform: rotate(108deg); -moz-transform: rotate(108deg); -webkit-transform: rotate(108deg); }
.char18 { transform: rotate(114deg); -moz-transform: rotate(114deg); -webkit-transform: rotate(114deg); }
.char19 { transform: rotate(120deg); -moz-transform: rotate(120deg); -webkit-transform: rotate(120deg); }
.char20 { transform: rotate(126deg); -moz-transform: rotate(126deg); -webkit-transform: rotate(126deg); }
.char21 { transform: rotate(132deg); -moz-transform: rotate(132deg); -webkit-transform: rotate(132deg); }
.char22 { transform: rotate(138deg); -moz-transform: rotate(138deg); -webkit-transform: rotate(138deg); }
.char23 { transform: rotate(144deg); -moz-transform: rotate(144deg); -webkit-transform: rotate(144deg); }
.mobile-only{display: none;}


/**************** responsive ******************/

@media only screen and (min-device-width: 320px) and (max-device-width: 567px){
.mobile-only{display: block;}
.desktop-only{display: none;}
.contact-form-inner{padding: 0 2%; width: 96%;}
.contact-form .pull-left {
   float: left; width: 100%; margin-right: 0; text-align: center;}
.contact-form .pull-right {float: left; width: 100%; text-align: center;}
.first-name{text-align: center;}
}
@media only screen and (min-device-width: 320px) and (max-device-width: 1024px){
.container{padding: 10px 0; background-image: none; height: auto;}
.curved-container{top:0;}
.contact-form-inner,.contact-form{padding: 0;}
.adoption-txt {font-size: 22px !important; padding: 15px 35px !important;}
}

</style>
 <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
 
</head>
<body>

<div class="contact-form"> <!--contact-form start here -->
 <div class="container"><!--container start here -->

   <form id="adminLogin" action="includes/save_certificate.php?do_action=" autocomplete="Off" method="post" class="signin-form" enctype="multipart/form-data">
              <input type="hidden" name="do_action" value="form_values">
    
    <div class="contact-form-inner">
      <div class="curved-container desktop-only">
       <h2>
	  <span class="char1">C</span><span class="char2">e</span><span class="char3">r</span><span class="char4">t</span>
      <span class="char5">i</span><span class="char6">f</span><span class="char7">i</span><span class="char8">c</span>
      <span class="char9">a</span><span class="char10">t</span><span class="char11">e</span><span class="char12"></span>
      <span class="char13">o</span><span class="char14">f</span><span class="char15"></span><span class="char16">a</span>
      <span class="char17">d</span><span class="char18">o</span><span class="char19">p</span><span class="char20">t</span>
      <span class="char21">i</span><span class="char22">o</span><span class="char23">n</span>
    </h2>      
    </div>
    <h2 class="mobile-only">certificate of adoption</h2>
     <p>This is to certifies that</p>
        <div class="first-section">
         <div class="pull-left"><input type="text" class="first-name" name="first_name" placeholder="FIRST NAME"></div>
         <div class="pull-right"><input type="text" name="last_name" placeholder="LAST NAME"></div>
        </div>
       <p>has adopted <input type="text" class="audio-pet" name="pet_name" placeholder="MY AUDIO PET"> who is hereby named</p>
     	<select name="have_pet" >
		  <option value="pet">NAME OF YOUR PET</option>
		  <option value="Boom Bear">Boom Bear</option>
		  <option value="Classical Cat">Classical Cat</option>
		  <option value="Mega Mouse">Mega Mouse</option>
		  <option value="pandamonium">pandamonium</option>
		  <option value="party pig">party pig</option>
		  <option value="power pup">power pup</option>
        </select>
      <p>on this day <input id="datepicker" type="text" value="<?php echo date("m/d/Y"); ?>" name="date" placeholder="DATE."></p>
      <p><input type="text" class="your-pet" name="petname" placeholder="NAME OF YOUR PET"> will now enjoy a harmonious, </p>
      <p>music-filled life with <input type="text" name="petname" placeholder="FIRST NAME"></p>
      <p>in <input type="text" name="city" placeholder="YOUR CITY">/<input type="text" name="state" placeholder="YOUR STATE"></p>
      <p class="adoption-txt">This adoption is authorized and approved by the power vested in MyAudioPet representative signed below. </p>
    </div>
    <br><br><br><br><br>
   <button type="submit" class="btn btn-primary" id="cmdSave" name="preview"> Submit </button>
   <button type="reset" class="btn btn-default" name="submit" > Reset </button
    </form>
 </div><!--container ends here -->
</div><!--contact-form ends here -->

</body>
</html>
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
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
  $( function() {
    $( "#datepicker" ).datepicker();
  } );
  </script>

