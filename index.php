<?php include_once('common.php');?>

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
      <div class="col-md-12">
      
       
       <h1 class="page-subhead-line">“Officially Adopt your pet! Use the form

          below to put in all your details, click submit, and you can preview &amp; print your certificate - it’s that easy!”</h1>
      </div>
    </div>
    <!-- /. ROW  -->
    <div class="row col-md-8">
      <div class="col-md-12" style="margin-left:200px">
        <div class="panel panel-info">
          <div class="panel-heading"> Select an option</div>
          <div class="panel-body">
            <form id="adminLogin" action="includes/process_actions.php?do_action=" autocomplete="Off" method="post" class="signin-form" enctype="multipart/form-data">
              <input type="hidden" name="do_action" value="form_values">
              
              <div id="output"></div>
              <?php 
			 
				   // Get data if the action is for edit 
				  if(isset($_GET['entry_id']) && !empty($_GET['entry_id']) ):
					 // Get data of requested id
					$id = $_GET['entry_id'];
					 $get_data = execute_query("SELECT * FROM ".USERS." WHERE id=".$id);
					 if(num_rows($get_data) > 0){
						$get_user = fetch_assoc($get_data);
					 }
					 
					
				   endif;
				  ?>
                   <?php if(isset($_GET['entry_id']) && !empty($_GET['entry_id']) ):  
				     $this_id = $_GET['entry_id'];?>
				    <a href="preview.php?entry_id=<?php echo $this_id; ?>" target="_blank">
					<button type="button" class="btn btn-primary" id="prv" name="preview" style="margin-right:10px;"> Preview Certificate </button></a>
				   
              
              <?php endif; ?> 
              
              <div class="form-group form_div" style="display:none; "> <span id="show_hide">“Please

                have your parent/ guardian help you with this form”</span><br>
                <div class="form-group">
                  <label>Your First Name </label>
                  <input class="form-control" type="text" name="first_name" placeholder="Enter your First Name" value="<?php if(isset($_GET['entry_id'])): echo $get_user['first_name']; endif;?>">
                </div>
                <div class="form-group">
                  <label>Your Last Name </label>
                  <input class="form-control" type="text" name="last_name" placeholder="Enter your Last Name" value="<?php if(isset($_GET['entry_id'])): echo $get_user['last_name']; endif;?>">
                </div>
                <div class="form-group">
                  <label>I have this My Audio Pet</label>
                  <select name="have_pet" class="form-control" style="width:100%;">
                    <option value="">Select pet</option>
                    
                    <option value="Boom Bear" <?php if(isset($_GET['entry_id'])): if($get_user['have_pet'] == 'Boom Bear') echo 'selected="selected"'; endif;?>>Boom Bear</option>
                    <option value="Classical Cat" <?php if(isset($_GET['entry_id'])): if($get_user['have_pet'] == 'Classical Cat') echo 'selected="selected"'; endif;?>>Classical Cat</option>
                    <option value="Mega Mouse" <?php if(isset($_GET['entry_id'])): if($get_user['have_pet'] == 'Mega Mouse') echo 'selected="selected"'; endif;?>>Mega Mouse</option>
                    <option value="Pandamonium" <?php if(isset($_GET['entry_id'])): if($get_user['have_pet'] == 'Pandamonium') echo 'selected="selected"'; endif;?>>Pandamonium</option>
                    <option value="Party Pig" <?php if(isset($_GET['entry_id'])): if($get_user['have_pet'] == 'Party Pig') echo 'selected="selected"'; endif;?>>Party Pig</option>
                    <option value="Power Pup" <?php if(isset($_GET['entry_id'])): if($get_user['have_pet'] == 'Power Pup') echo 'selected="selected"'; endif;?>>Power Pup</option>
                  </select>
                </div>
                <div class="form-group">
                  <label>What name do you want to give your new Pet</label>
                  <input class="form-control" type="text" name="pet_name" placeholder="Enter Pet New Name" value="<?php if(isset($_GET['entry_id'])): echo $get_user['pet_name']; endif;?>">
                </div>
                
                <div class="form-group">
                  <label>Address line 1</label>
                  <input class="form-control" type="text" name="line_1" placeholder="Enter Address line 1" value="<?php if(isset($_GET['entry_id'])): echo $get_user['line_1']; endif;?>">
                </div>
                <div class="form-group">
                  <label>Address line 2</label>
                  <input class="form-control" type="text" name="line_2" placeholder="Enter Address line 2" value="<?php if(isset($_GET['entry_id'])): echo $get_user['line_2']; endif;?>">
                </div>
                
                <div class="form-group">
                  <label>Country</label>
                  <select name="country" id="country" class="form-control" style="width:100%;">
                    <option value="">Select Country</option>
                    <option value="United States" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'United States') echo 'selected="selected"'; endif;?>>United States</option>
                    <option value="Canada" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Canada') echo 'selected="selected"'; endif;?>>Canada</option>
                    <option value="Afghanistan" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Afghanistan') echo 'selected="selected"'; endif;?>>Afghanistan</option>
                    <option value="Albania" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Albania') echo 'selected="selected"'; endif;?>>Albania</option>
                    <option value="Algeria" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Algeria') echo 'selected="selected"'; endif;?>>Algeria</option>
                    <option value="American Samoa" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'American Samoa') echo 'selected="selected"'; endif;?>>American Samoa</option>
                    <option value="Andorra" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Andorra') echo 'selected="selected"'; endif;?>>Andorra</option>
                    <option value="Angola" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Angola') echo 'selected="selected"'; endif;?>>Angola</option>
                    <option value="Anguilla" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Anguilla') echo 'selected="selected"'; endif;?>>Anguilla</option>
                    <option value="Antartica" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Antartica') echo 'selected="selected"'; endif;?>>Antarctica</option>
                    <option value="Antigua and Barbuda" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Antigua and Barbuda') echo 'selected="selected"'; endif;?>>Antigua and Barbuda</option>
                    <option value="Argentina" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Argentina') echo 'selected="selected"'; endif;?>>Argentina</option>
                    <option value="Armenia" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Armenia') echo 'selected="selected"'; endif;?>>Armenia</option>
                    <option value="Aruba" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Aruba') echo 'selected="selected"'; endif;?>>Aruba</option>
                    <option value="Australia" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Australia') echo 'selected="selected"'; endif;?>>Australia</option>
                    <option value="Austria" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Austria') echo 'selected="selected"'; endif;?>>Austria</option>
                    <option value="Azerbaijan" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Azerbaijan') echo 'selected="selected"'; endif;?>>Azerbaijan</option>
                    <option value="Bahamas" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Bahamas') echo 'selected="selected"'; endif;?>>Bahamas</option>
                    <option value="Bahrain" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Bahrain') echo 'selected="selected"'; endif;?>>Bahrain</option>
                    <option value="Bangladesh" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Bangladesh') echo 'selected="selected"'; endif;?>>Bangladesh</option>
                    <option value="Barbados" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Barbados') echo 'selected="selected"'; endif;?>>Barbados</option>
                    <option value="Belarus" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Belarus') echo 'selected="selected"'; endif;?>>Belarus</option>
                    <option value="Belgium" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Belgium') echo 'selected="selected"'; endif;?>>Belgium</option>
                    <option value="Belize" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Belize') echo 'selected="selected"'; endif;?>>Belize</option>
                    <option value="Benin" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Benin') echo 'selected="selected"'; endif;?>>Benin</option>
                    <option value="Bermuda" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Bermuda') echo 'selected="selected"'; endif;?>>Bermuda</option>
                    <option value="Bhutan" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Bhutan') echo 'selected="selected"'; endif;?>>Bhutan</option>
                    <option value="Bolivia" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Bolivia') echo 'selected="selected"'; endif;?>>Bolivia</option>
                    <option value="Bosnia and Herzegowina" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Bosnia and Herzegowina') echo 'selected="selected"'; endif;?>>Bosnia and Herzegowina</option>
                    <option value="Botswana" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Botswana') echo 'selected="selected"'; endif;?>>Botswana</option>
                    <option value="Bouvet Island" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Bouvet Island') echo 'selected="selected"'; endif;?>>Bouvet Island</option>
                    <option value="Brazil" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Brazil') echo 'selected="selected"'; endif;?>>Brazil</option>
                    <option value="British Indian Ocean Territory" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'British Indian Ocean Territory') echo 'selected="selected"'; endif;?>>British Indian
                    Ocean Territory</option>
                    <option value="Brunei Darussalam" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Brunei Darussalam') echo 'selected="selected"'; endif;?>>Brunei Darussalam</option>
                    <option value="Bulgaria" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Bulgaria') echo 'selected="selected"'; endif;?>>Bulgaria</option>
                    <option value="Burkina Faso" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Burkina Faso') echo 'selected="selected"'; endif;?>>Burkina Faso</option>
                    <option value="Burundi" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Burundi') echo 'selected="selected"'; endif;?>>Burundi</option>
                    <option value="Cambodia" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Cambodia') echo 'selected="selected"'; endif;?>>Cambodia</option>
                    <option value="Cameroon" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Cameroon') echo 'selected="selected"'; endif;?>>Cameroon</option>
                    <option value="Cape Verde" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Cape Verde') echo 'selected="selected"'; endif;?>>Cape Verde</option>
                    <option value="Cayman Islands" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Cayman Islands') echo 'selected="selected"'; endif;?>>Cayman Islands</option>
                    <option value="Central African Republic" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Central African Republic') echo 'selected="selected"'; endif;?>>Central African
                    Republic</option>
                    <option value="Chad" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'xx') echo 'selected="selected"'; endif;?>>Chad</option>
                    <option value="Chile" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'xx') echo 'selected="selected"'; endif;?>>Chile</option>
                    <option value="China" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'China') echo 'selected="selected"'; endif;?>>China</option>
                    <option value="Christmas Island" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Christmas Island') echo 'selected="selected"'; endif;?>>Christmas Island</option>
                    <option value="Cocos Islands" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Cocos Islands') echo 'selected="selected"'; endif;?>>Cocos (Keeling) Islands</option>
                    <option value="Colombia" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Colombia') echo 'selected="selected"'; endif;?>>Colombia</option>
                    <option value="Comoros" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Comoros') echo 'selected="selected"'; endif;?>>Comoros</option>
                    <option value="Congo" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Congo') echo 'selected="selected"'; endif;?>>Congo</option>
                    <option value="Congo" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Congo') echo 'selected="selected"'; endif;?>>Congo, the Democratic Republic of the</option>
                    <option value="Cook Islands" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Cook Islands') echo 'selected="selected"'; endif;?>>Cook Islands</option>
                    <option value="Costa Rica" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Costa Rica') echo 'selected="selected"'; endif;?>>Costa Rica</option>
                    <option value="Cota D'Ivoire" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Cota D\'Ivoire') echo 'selected="selected"'; endif;?>>Cote d'Ivoire</option>
                    <option value="Croatia" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Croatia') echo 'selected="selected"'; endif;?>>Croatia (Hrvatska)</option>
                    <option value="Cuba" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Cuba') echo 'selected="selected"'; endif;?>>Cuba</option>
                    <option value="Cyprus" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Cyprus') echo 'selected="selected"'; endif;?>>Cyprus</option>
                    <option value="Czech Republic" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Czech Republic') echo 'selected="selected"'; endif;?>>Czech Republic</option>
                    <option value="Denmark" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Denmark') echo 'selected="selected"'; endif;?>>Denmark</option>
                    <option value="Djibouti" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Djibouti') echo 'selected="selected"'; endif;?>>Djibouti</option>
                    <option value="Dominica" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Dominica') echo 'selected="selected"'; endif;?>>Dominica</option>
                    <option value="Dominican Republic" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Dominican Republic') echo 'selected="selected"'; endif;?>>Dominican Republic</option>
                    <option value="East Timor" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'East Timor') echo 'selected="selected"'; endif;?>>East Timor</option>
                    <option value="Ecuador" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Ecuador') echo 'selected="selected"'; endif;?>>Ecuador</option>
                    <option value="Egypt" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Egypt') echo 'selected="selected"'; endif;?>>Egypt</option>
                    <option value="El Salvador" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'El Salvador') echo 'selected="selected"'; endif;?>>El Salvador</option>
                    <option value="Equatorial Guinea" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Equatorial Guinea') echo 'selected="selected"'; endif;?>>Equatorial Guinea</option>
                    <option value="Eritrea" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Eritrea') echo 'selected="selected"'; endif;?>>Eritrea</option>
                    <option value="Estonia" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Estonia') echo 'selected="selected"'; endif;?>>Estonia</option>
                    <option value="Ethiopia" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Ethiopia') echo 'selected="selected"'; endif;?>>Ethiopia</option>
                    <option value="Falkland Islands" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Falkland Islands') echo 'selected="selected"'; endif;?>>Falkland Islands (Malvinas)</option>
                    <option value="Faroe Islands" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Faroe Islands') echo 'selected="selected"'; endif;?>>Faroe Islands</option>
                    <option value="Fiji" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Fiji') echo 'selected="selected"'; endif;?>>Fiji</option>
                    <option value="Finland" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Finland') echo 'selected="selected"'; endif;?>>Finland</option>
                    <option value="France" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'France') echo 'selected="selected"'; endif;?>>France</option>
                    <option value="France Metropolitan" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'France Metropolitan') echo 'selected="selected"'; endif;?>>France, Metropolitan</option>
                    <option value="French Guiana" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'French Guiana') echo 'selected="selected"'; endif;?>>French Guiana</option>
                    <option value="French Polynesia" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'French Polynesia') echo 'selected="selected"'; endif;?>>French Polynesia</option>
                    <option value="French Southern Territories" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'French Southern Territories') echo 'selected="selected"'; endif;?>>French Southern
                    Territories</option>
                    <option value="Gabon" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Gabon') echo 'selected="selected"'; endif;?>>Gabon</option>
                    <option value="Gambia" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Gambia') echo 'selected="selected"'; endif;?>>Gambia</option>
                    <option value="Georgia" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Georgia') echo 'selected="selected"'; endif;?>>Georgia</option>
                    <option value="Germany" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Germany') echo 'selected="selected"'; endif;?>>Germany</option>
                    <option value="Ghana" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Ghana') echo 'selected="selected"'; endif;?>>Ghana</option>
                    <option value="Gibraltar" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Gibraltar') echo 'selected="selected"'; endif;?>>Gibraltar</option>
                    <option value="Greece" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Greece') echo 'selected="selected"'; endif;?>>Greece</option>
                    <option value="Greenland" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Greenland') echo 'selected="selected"'; endif;?>>Greenland</option>
                    <option value="Grenada" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Grenada') echo 'selected="selected"'; endif;?>>Grenada</option>
                    <option value="Guadeloupe" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Guadeloupe') echo 'selected="selected"'; endif;?>>Guadeloupe</option>
                    <option value="Guam" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Guam') echo 'selected="selected"'; endif;?>>Guam</option>
                    <option value="Guatemala" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Guatemala') echo 'selected="selected"'; endif;?>>Guatemala</option>
                    <option value="Guinea" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Guinea') echo 'selected="selected"'; endif;?>>Guinea</option>
                    <option value="Guinea-Bissau" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Guinea-Bissau') echo 'selected="selected"'; endif;?>>Guinea-Bissau</option>
                    <option value="Guyana" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Guyana') echo 'selected="selected"'; endif;?>>Guyana</option>
                    <option value="Haiti" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Haiti') echo 'selected="selected"'; endif;?>>Haiti</option>
                    <option value="Heard and McDonald Islands" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Heard and McDonald Islands') echo 'selected="selected"'; endif;?>>Heard and Mc Donald
                    Islands</option>
                    <option value="Holy See" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Holy See') echo 'selected="selected"'; endif;?>>Holy See (Vatican City State)</option>
                    <option value="Honduras" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Honduras') echo 'selected="selected"'; endif;?>>Honduras</option>
                    <option value="Hong Kong" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Hong Kong') echo 'selected="selected"'; endif;?>>Hong Kong</option>
                    <option value="Hungary" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Hungary') echo 'selected="selected"'; endif;?>>Hungary</option>
                    <option value="Iceland" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Iceland') echo 'selected="selected"'; endif;?>>Iceland</option>
                    <option value="India" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'India') echo 'selected="selected"'; endif;?>>India</option>
                    <option value="Indonesia" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Indonesia') echo 'selected="selected"'; endif;?>>Indonesia</option>
                    <option value="Iran" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Iran') echo 'selected="selected"'; endif;?>>Iran (Islamic Republic of)</option>
                    <option value="Iraq" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Iraq') echo 'selected="selected"'; endif;?>>Iraq</option>
                    <option value="Ireland" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Ireland') echo 'selected="selected"'; endif;?>>Ireland</option>
                    <option value="Israel" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Israel') echo 'selected="selected"'; endif;?>>Israel</option>
                    <option value="Italy" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Italy') echo 'selected="selected"'; endif;?>>Italy</option>
                    <option value="Jamaica" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Jamaica') echo 'selected="selected"'; endif;?>>Jamaica</option>
                    <option value="Japan" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Japan') echo 'selected="selected"'; endif;?>>Japan</option>
                    <option value="Jordan" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Jordan') echo 'selected="selected"'; endif;?>>Jordan</option>
                    <option value="Kazakhstan" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Kazakhstan') echo 'selected="selected"'; endif;?>>Kazakhstan</option>
                    <option value="Kenya" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Kenya') echo 'selected="selected"'; endif;?>>Kenya</option>
                    <option value="Kiribati" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Kiribati') echo 'selected="selected"'; endif;?>>Kiribati</option>
                    <option value="Democratic People's Republic of Korea" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Democratic People\'s Republic of Korea') echo 'selected="selected"'; endif;?>>Korea,
                    Democratic People's Republic of</option>
                    <option value="Korea" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Korea') echo 'selected="selected"'; endif;?>>Korea, Republic of</option>
                    <option value="Kuwait" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Kuwait') echo 'selected="selected"'; endif;?>>Kuwait</option>
                    <option value="Kyrgyzstan" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Kyrgyzstan') echo 'selected="selected"'; endif;?>>Kyrgyzstan</option>
                    <option value="Lao" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Lao') echo 'selected="selected"'; endif;?>>Lao People's Democratic Republic</option>
                    <option value="Latvia" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Latvia') echo 'selected="selected"'; endif;?>>Latvia</option>
                    <option value="Lebanon" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Lebanon') echo 'selected="selected"'; endif;?>>Lebanon</option>
                    <option value="Lesotho" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Lesotho') echo 'selected="selected"'; endif;?>>Lesotho</option>
                    <option value="Liberia" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Liberia') echo 'selected="selected"'; endif;?>>Liberia</option>
                    <option value="Libyan Arab Jamahiriya" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Libyan Arab Jamahiriya') echo 'selected="selected"'; endif;?>>Libyan Arab Jamahiriya</option>
                    <option value="Liechtenstein" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Liechtenstein') echo 'selected="selected"'; endif;?>>Liechtenstein</option>
                    <option value="Lithuania" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Lithuania') echo 'selected="selected"'; endif;?>>Lithuania</option>
                    <option value="Luxembourg" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Luxembourg') echo 'selected="selected"'; endif;?>>Luxembourg</option>
                    <option value="Macau" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Macau') echo 'selected="selected"'; endif;?>>Macau</option>
                    <option value="Macedonia" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Macedonia') echo 'selected="selected"'; endif;?>>Macedonia, The Former Yugoslav
                    Republic of</option>
                    <option value="Madagascar" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Madagascar') echo 'selected="selected"'; endif;?>>Madagascar</option>
                    <option value="Malawi" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Malawi') echo 'selected="selected"'; endif;?>>Malawi</option>
                    <option value="Malaysia" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Malaysia') echo 'selected="selected"'; endif;?>>Malaysia</option>
                    <option value="Maldives" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Maldives') echo 'selected="selected"'; endif;?>>Maldives</option>
                    <option value="Mali" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Mali') echo 'selected="selected"'; endif;?>>Mali</option>
                    <option value="Malta" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Malta') echo 'selected="selected"'; endif;?>>Malta</option>
                    <option value="Marshall Islands" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Marshall Islands') echo 'selected="selected"'; endif;?>>Marshall Islands</option>
                    <option value="Martinique" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Martinique') echo 'selected="selected"'; endif;?>>Martinique</option>
                    <option value="Mauritania" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Mauritania') echo 'selected="selected"'; endif;?>>Mauritania</option>
                    <option value="Mauritius" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Mauritius') echo 'selected="selected"'; endif;?>>Mauritius</option>
                    <option value="Mayotte" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Mayotte') echo 'selected="selected"'; endif;?>>Mayotte</option>
                    <option value="Mexico" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Mexico') echo 'selected="selected"'; endif;?>>Mexico</option>
                    <option value="Micronesia" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Micronesia') echo 'selected="selected"'; endif;?>>Micronesia, Federated States of</option>
                    <option value="Moldova" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Moldova') echo 'selected="selected"'; endif;?>>Moldova, Republic of</option>
                    <option value="Monaco" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Monaco') echo 'selected="selected"'; endif;?>>Monaco</option>
                    <option value="Mongolia" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Mongolia') echo 'selected="selected"'; endif;?>>Mongolia</option>
                    <option value="Montserrat" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Montserrat') echo 'selected="selected"'; endif;?>>Montserrat</option>
                    <option value="Morocco" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Morocco') echo 'selected="selected"'; endif;?>>Morocco</option>
                    <option value="Mozambique" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Mozambique') echo 'selected="selected"'; endif;?>>Mozambique</option>
                    <option value="Myanmar" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Myanmar') echo 'selected="selected"'; endif;?>>Myanmar</option>
                    <option value="Namibia" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Namibia') echo 'selected="selected"'; endif;?>>Namibia</option>
                    <option value="Nauru" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Nauru') echo 'selected="selected"'; endif;?>>Nauru</option>
                    <option value="Nepal" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Nepal') echo 'selected="selected"'; endif;?>>Nepal</option>
                    <option value="Netherlands" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Netherlands') echo 'selected="selected"'; endif;?>>Netherlands</option>
                    <option value="Netherlands Antilles" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Netherlands Antilles') echo 'selected="selected"'; endif;?>>Netherlands Antilles</option>
                    <option value="New Caledonia" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'New Caledonia') echo 'selected="selected"'; endif;?>>New Caledonia</option>
                    <option value="New Zealand" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'New Zealand') echo 'selected="selected"'; endif;?>>New Zealand</option>
                    <option value="Nicaragua" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Nicaragua') echo 'selected="selected"'; endif;?>>Nicaragua</option>
                    <option value="Niger" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Niger') echo 'selected="selected"'; endif;?>>Niger</option>
                    <option value="Nigeria" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Nigeria') echo 'selected="selected"'; endif;?>>Nigeria</option>
                    <option value="Niue" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Niue') echo 'selected="selected"'; endif;?>>Niue</option>
                    <option value="Norfolk Island" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Norfolk Island') echo 'selected="selected"'; endif;?>>Norfolk Island</option>
                    <option value="Northern Mariana Islands" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Northern Mariana Islands') echo 'selected="selected"'; endif;?>>Northern Mariana
                    Islands</option>
                    <option value="Norway" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Norway') echo 'selected="selected"'; endif;?>>Norway</option>
                    <option value="Oman" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Oman') echo 'selected="selected"'; endif;?>>Oman</option>
                    <option value="Pakistan" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Pakistan') echo 'selected="selected"'; endif;?>>Pakistan</option>
                    <option value="Palau" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Palau') echo 'selected="selected"'; endif;?>>Palau</option>
                    <option value="Panama" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Panama') echo 'selected="selected"'; endif;?>>Panama</option>
                    <option value="Papua New Guinea" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Papua New Guinea') echo 'selected="selected"'; endif;?>>Papua New Guinea</option>
                    <option value="Paraguay" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Paraguay') echo 'selected="selected"'; endif;?>>Paraguay</option>
                    <option value="Peru" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Peru') echo 'selected="selected"'; endif;?>>Peru</option>
                    <option value="Philippines" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Philippines') echo 'selected="selected"'; endif;?>>Philippines</option>
                    <option value="Pitcairn" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Pitcairn') echo 'selected="selected"'; endif;?>>Pitcairn</option>
                    <option value="Poland" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Poland') echo 'selected="selected"'; endif;?>>Poland</option>
                    <option value="Portugal" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Portugal') echo 'selected="selected"'; endif;?>>Portugal</option>
                    <option value="Puerto Rico" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Puerto Rico') echo 'selected="selected"'; endif;?>>Puerto Rico</option>
                    <option value="Qatar" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Qatar') echo 'selected="selected"'; endif;?>>Qatar</option>
                    <option value="Reunion" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Reunion') echo 'selected="selected"'; endif;?>>Reunion</option>
                    <option value="Romania" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Romania') echo 'selected="selected"'; endif;?>>Romania</option>
                    <option value="Russia" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Russia') echo 'selected="selected"'; endif;?>>Russian Federation</option>
                    <option value="Rwanda" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Rwanda') echo 'selected="selected"'; endif;?>>Rwanda</option>
                    <option value="Saint Kitts and Nevis" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Saint Kitts and Nevis') echo 'selected="selected"'; endif;?>>Saint Kitts and Nevis</option>
                    <option value="Saint LUCIA" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Saint LUCIA') echo 'selected="selected"'; endif;?>>Saint LUCIA</option>
                    <option value="Saint Vincent" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Saint Vincent') echo 'selected="selected"'; endif;?>>Saint Vincent and the Grenadines</option>
                    <option value="Samoa" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Samoa') echo 'selected="selected"'; endif;?>>Samoa</option>
                    <option value="San Marino" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'San Marino') echo 'selected="selected"'; endif;?>>San Marino</option>
                    <option value="Sao Tome and Principe" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Sao Tome and Principe') echo 'selected="selected"'; endif;?>>Sao Tome and Principe</option>
                    <option value="Saudi Arabia" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Saudi Arabia') echo 'selected="selected"'; endif;?>>Saudi Arabia</option>
                    <option value="Senegal" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Senegal') echo 'selected="selected"'; endif;?>>Senegal</option>
                    <option value="Seychelles" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Seychelles') echo 'selected="selected"'; endif;?>>Seychelles</option>
                    <option value="Sierra" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Sierra') echo 'selected="selected"'; endif;?>>Sierra Leone</option>
                    <option value="Singapore" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Singapore') echo 'selected="selected"'; endif;?>>Singapore</option>
                    <option value="Slovakia" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Slovakia') echo 'selected="selected"'; endif;?>>Slovakia (Slovak Republic)</option>
                    <option value="Slovenia" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Slovenia') echo 'selected="selected"'; endif;?>>Slovenia</option>
                    <option value="Solomon Islands" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Solomon Islands') echo 'selected="selected"'; endif;?>>Solomon Islands</option>
                    <option value="Somalia" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Somalia') echo 'selected="selected"'; endif;?>>Somalia</option>
                    <option value="South Africa" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'South Africa') echo 'selected="selected"'; endif;?>>South Africa</option>
                    <option value="South Georgia" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'South Georgia') echo 'selected="selected"'; endif;?>>South Georgia and the South
                    Sandwich Islands</option>
                    <option value="Span" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Span') echo 'selected="selected"'; endif;?>>Spain</option>
                    <option value="SriLanka" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'SriLanka') echo 'selected="selected"'; endif;?>>Sri Lanka</option>
                    <option value="St. Helena" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'St. Helena') echo 'selected="selected"'; endif;?>>St. Helena</option>
                    <option value="St. Pierre and Miguelon" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'St. Pierre and Miguelon') echo 'selected="selected"'; endif;?>>St. Pierre and Miquelon</option>
                    <option value="Sudan" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Sudan') echo 'selected="selected"'; endif;?>>Sudan</option>
                    <option value="Suriname" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Suriname') echo 'selected="selected"'; endif;?>>Suriname</option>
                    <option value="Svalbard" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Svalbard') echo 'selected="selected"'; endif;?>>Svalbard and Jan Mayen Islands</option>
                    <option value="Swaziland" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Swaziland') echo 'selected="selected"'; endif;?>>Swaziland</option>
                    <option value="Sweden" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Sweden') echo 'selected="selected"'; endif;?>>Sweden</option>
                    <option value="Switzerland" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Switzerland') echo 'selected="selected"'; endif;?>>Switzerland</option>
                    <option value="Syria" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Syria') echo 'selected="selected"'; endif;?>>Syrian Arab Republic</option>
                    <option value="Taiwan" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Taiwan') echo 'selected="selected"'; endif;?>>Taiwan, Province of China</option>
                    <option value="Tajikistan" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Tajikistan') echo 'selected="selected"'; endif;?>>Tajikistan</option>
                    <option value="Tanzania" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Tanzania') echo 'selected="selected"'; endif;?>>Tanzania, United Republic of</option>
                    <option value="Thailand" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Thailand') echo 'selected="selected"'; endif;?>>Thailand</option>
                    <option value="Togo" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Togo') echo 'selected="selected"'; endif;?>>Togo</option>
                    <option value="Tokelau" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Tokelau') echo 'selected="selected"'; endif;?>>Tokelau</option>
                    <option value="Tonga" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Tonga') echo 'selected="selected"'; endif;?>>Tonga</option>
                    <option value="Trinidad and Tobago" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Trinidad and Tobago') echo 'selected="selected"'; endif;?>>Trinidad and Tobago</option>
                    <option value="Tunisia" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Tunisia') echo 'selected="selected"'; endif;?>>Tunisia</option>
                    <option value="Turkey" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Turkey') echo 'selected="selected"'; endif;?>>Turkey</option>
                    <option value="Turkmenistan" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Turkmenistan') echo 'selected="selected"'; endif;?>>Turkmenistan</option>
                    <option value="Turks and Caicos" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Turks and Caicos') echo 'selected="selected"'; endif;?>>Turks and Caicos Islands</option>
                    <option value="Tuvalu" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Tuvalu') echo 'selected="selected"'; endif;?>>Tuvalu</option>
                    <option value="Uganda" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Uganda') echo 'selected="selected"'; endif;?>>Uganda</option>
                    <option value="Ukraine" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Ukraine') echo 'selected="selected"'; endif;?>>Ukraine</option>
                    <option value="United Arab Emirates" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'United Arab Emirates') echo 'selected="selected"'; endif;?>>United Arab Emirates</option>
                    <option value="United Kingdom" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'United Kingdom') echo 'selected="selected"'; endif;?>>United Kingdom</option>
                    <option value="United States Minor Outlying Islands" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'United States Minor Outlying Islands') echo 'selected="selected"'; endif;?>>United
                    States Minor Outlying Islands</option>
                    <option value="Uruguay" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Uruguay') echo 'selected="selected"'; endif;?>>Uruguay</option>
                    <option value="Uzbekistan" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Uzbekistan') echo 'selected="selected"'; endif;?>>Uzbekistan</option>
                    <option value="Vanuatu" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Vanuatu') echo 'selected="selected"'; endif;?>>Vanuatu</option>
                    <option value="Venezuela" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Venezuela') echo 'selected="selected"'; endif;?>>Venezuela</option>
                    <option value="Vietnam" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Vietnam') echo 'selected="selected"'; endif;?>>Viet Nam</option>
                    <option value="Virgin Islands (British)" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Virgin Islands (British)') echo 'selected="selected"'; endif;?>>Virgin Islands (British)</option>
                    <option value="Virgin Islands (U.S)" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Virgin Islands (U.S)') echo 'selected="selected"'; endif;?>>Virgin Islands (U.S.)</option>
                    <option value="Wallis and Futana Islands" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Wallis and Futana Islands') echo 'selected="selected"'; endif;?>>Wallis and Futuna
                    Islands</option>
                    <option value="Western Sahara" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Western Sahara') echo 'selected="selected"'; endif;?>>Western Sahara</option>
                    <option value="Yemen" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Yemen') echo 'selected="selected"'; endif;?>>Yemen</option>
                    <option value="Yugoslavia" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Yugoslavia') echo 'selected="selected"'; endif;?>>Yugoslavia</option>
                    <option value="Zambia" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Zambia') echo 'selected="selected"'; endif;?>>Zambia</option>
                    <option value="Zimbabwe" <?php if(isset($_GET['entry_id'])): if($get_user['country'] == 'Zimbabwe') echo 'selected="selected"'; endif;?>>Zimbabwe</option>
                  </select>
                </div>
                <div class="form-group" >
                  <label>State / Province</label>
                  <?php if(isset($_GET['entry_id']) && !empty($_GET['entry_id']) && $get_user['country'] == 'United States'){
						      $style = "display:block";
							  $style2 = "display:none";
						}else{
						      $style = "display:none";
							  $style2 = "display:block";
						}
					?>
                   <select name="state_drop" id="state_drop" class="form-control" style="width:100%; <?php echo $style; ?>" >
	<option value="Alabama" <?php if(isset($_GET['entry_id'])): if($get_user['state'] == 'Alabama') echo 'selected="selected"'; endif;?>>Alabama</option>
	<option value="Alaska" <?php if(isset($_GET['entry_id'])): if($get_user['state'] == 'Alaska') echo 'selected="selected"'; endif;?>>Alaska</option>
	<option value="Arizona" <?php if(isset($_GET['entry_id'])): if($get_user['state'] == 'Arizona') echo 'selected="selected"'; endif;?>>Arizona</option>
	<option value="Arkansas" <?php if(isset($_GET['entry_id'])): if($get_user['state'] == 'Arkansas') echo 'selected="selected"'; endif;?>>Arkansas</option>
	<option value="California" <?php if(isset($_GET['entry_id'])): if($get_user['state'] == 'California') echo 'selected="selected"'; endif;?>>California</option>
	<option value="Colorado" <?php if(isset($_GET['entry_id'])): if($get_user['state'] == 'Colorado') echo 'selected="selected"'; endif;?>>Colorado</option>
	<option value="Connecticut" <?php if(isset($_GET['entry_id'])): if($get_user['state'] == 'Connecticut') echo 'selected="selected"'; endif;?>>Connecticut</option>
	<option value="Delaware" <?php if(isset($_GET['entry_id'])): if($get_user['state'] == 'Delaware') echo 'selected="selected"'; endif;?>>Delaware</option>
	<option value="District of Columbia" <?php if(isset($_GET['entry_id'])): if($get_user['state'] == 'District of Columbia') echo 'selected="selected"'; endif;?>>District of Columbia</option>
	<option value="Florida" <?php if(isset($_GET['entry_id'])): if($get_user['state'] == 'Florida') echo 'selected="selected"'; endif;?>>Florida</option>
	<option value="Georgia" <?php if(isset($_GET['entry_id'])): if($get_user['state'] == 'Georgia') echo 'selected="selected"'; endif;?>>Georgia</option>
	<option value="Hawaii" <?php if(isset($_GET['entry_id'])): if($get_user['state'] == 'Hawaii') echo 'selected="selected"'; endif;?>>Hawaii</option>
	<option value="Idaho" <?php if(isset($_GET['entry_id'])): if($get_user['state'] == 'Idaho') echo 'selected="selected"'; endif;?>>Idaho</option>
	<option value="Illinois" <?php if(isset($_GET['entry_id'])): if($get_user['state'] == 'Illinois') echo 'selected="selected"'; endif;?>>Illinois</option>
	<option value="Indiana" <?php if(isset($_GET['entry_id'])): if($get_user['state'] == 'Indiana') echo 'selected="selected"'; endif;?>>Indiana</option>
	<option value="Iowa" <?php if(isset($_GET['entry_id'])): if($get_user['state'] == 'Iowa') echo 'selected="selected"'; endif;?>>Iowa</option>
	<option value="Kansas" <?php if(isset($_GET['entry_id'])): if($get_user['state'] == 'Kansas') echo 'selected="selected"'; endif;?>>Kansas</option>
	<option value="Kentucky" <?php if(isset($_GET['entry_id'])): if($get_user['state'] == 'Kentucky') echo 'selected="selected"'; endif;?>>Kentucky</option>
	<option value="Louisiana" <?php if(isset($_GET['entry_id'])): if($get_user['state'] == 'Louisiana') echo 'selected="selected"'; endif;?>>Louisiana</option>
	<option value="Maine" <?php if(isset($_GET['entry_id'])): if($get_user['state'] == 'Maine') echo 'selected="selected"'; endif;?>>Maine</option>
	<option value="Maryland" <?php if(isset($_GET['entry_id'])): if($get_user['state'] == 'Maryland') echo 'selected="selected"'; endif;?>>Maryland</option>
	<option value="Massachusetts" <?php if(isset($_GET['entry_id'])): if($get_user['state'] == 'Massachusetts') echo 'selected="selected"'; endif;?>>Massachusetts</option>
	<option value="Michigan" <?php if(isset($_GET['entry_id'])): if($get_user['state'] == 'Michigan') echo 'selected="selected"'; endif;?>>Michigan</option>
	<option value="Minnesota" <?php if(isset($_GET['entry_id'])): if($get_user['state'] == 'Minnesota') echo 'selected="selected"'; endif;?>>Minnesota</option>
	<option value="Mississippi" <?php if(isset($_GET['entry_id'])): if($get_user['state'] == 'Mississippi') echo 'selected="selected"'; endif;?>>Mississippi</option>
	<option value="Missouri" <?php if(isset($_GET['entry_id'])): if($get_user['state'] == 'Missouri') echo 'selected="selected"'; endif;?>>Missouri</option>
	<option value="Montana" <?php if(isset($_GET['entry_id'])): if($get_user['state'] == 'Montana') echo 'selected="selected"'; endif;?>>Montana</option>
	<option value="Nebraska" <?php if(isset($_GET['entry_id'])): if($get_user['state'] == 'Nebraska') echo 'selected="selected"'; endif;?>>Nebraska</option>
	<option value="Nevada" <?php if(isset($_GET['entry_id'])): if($get_user['state'] == 'Nevada') echo 'selected="selected"'; endif;?>>Nevada</option>
	<option value="New Hampshire" <?php if(isset($_GET['entry_id'])): if($get_user['state'] == 'New Hampshire') echo 'selected="selected"'; endif;?>>New Hampshire</option>
	<option value="New Jersey" <?php if(isset($_GET['entry_id'])): if($get_user['state'] == 'New Jersey') echo 'selected="selected"'; endif;?>>New Jersey</option>
	<option value="New Mexico" <?php if(isset($_GET['entry_id'])): if($get_user['state'] == 'New Mexico') echo 'selected="selected"'; endif;?>>New Mexico</option>
	<option value="New York" <?php if(isset($_GET['entry_id'])): if($get_user['state'] == 'New York') echo 'selected="selected"'; endif;?>>New York</option>
	<option value="North Carolina" <?php if(isset($_GET['entry_id'])): if($get_user['state'] == 'North Carolina') echo 'selected="selected"'; endif;?>>North Carolina</option>
	<option value="North Dakota" <?php if(isset($_GET['entry_id'])): if($get_user['state'] == 'North Dakota') echo 'selected="selected"'; endif;?>>North Dakota</option>
	<option value="Ohio" <?php if(isset($_GET['entry_id'])): if($get_user['state'] == 'Ohio') echo 'selected="selected"'; endif;?>>Ohio</option>
	<option value="Oklahoma" <?php if(isset($_GET['entry_id'])): if($get_user['state'] == 'Oklahoma') echo 'selected="selected"'; endif;?>>Oklahoma</option>
	<option value="Oregon" <?php if(isset($_GET['entry_id'])): if($get_user['state'] == 'Oregon') echo 'selected="selected"'; endif;?>>Oregon</option>
	<option value="Pennsylvania" <?php if(isset($_GET['entry_id'])): if($get_user['state'] == 'Pennsylvania') echo 'selected="selected"'; endif;?>>Pennsylvania</option>
	<option value="Rhode Island" <?php if(isset($_GET['entry_id'])): if($get_user['state'] == 'Rhode Island') echo 'selected="selected"'; endif;?>>Rhode Island</option>
	<option value="South Carolina" <?php if(isset($_GET['entry_id'])): if($get_user['state'] == 'South Carolina') echo 'selected="selected"'; endif;?>>South Carolina</option>
	<option value="South Dakota" <?php if(isset($_GET['entry_id'])): if($get_user['state'] == 'South Dakota') echo 'selected="selected"'; endif;?>>South Dakota</option>
	<option value="Tennessee" <?php if(isset($_GET['entry_id'])): if($get_user['state'] == 'Tennessee') echo 'selected="selected"'; endif;?>>Tennessee</option>
	<option value="Texas" <?php if(isset($_GET['entry_id'])): if($get_user['state'] == 'Texas') echo 'selected="selected"'; endif;?>>Texas</option>
	<option value="Utah" <?php if(isset($_GET['entry_id'])): if($get_user['state'] == 'Utah') echo 'selected="selected"'; endif;?>>Utah</option>
	<option value="Vermont" <?php if(isset($_GET['entry_id'])): if($get_user['state'] == 'Vermont') echo 'selected="selected"'; endif;?>>Vermont</option>
	<option value="Virginia" <?php if(isset($_GET['entry_id'])): if($get_user['state'] == 'Virginia') echo 'selected="selected"'; endif;?>>Virginia</option>
	<option value="Washington" <?php if(isset($_GET['entry_id'])): if($get_user['state'] == 'Washington') echo 'selected="selected"'; endif;?>>Washington</option>
	<option value="West Virginia" <?php if(isset($_GET['entry_id'])): if($get_user['state'] == 'West Virginia') echo 'selected="selected"'; endif;?>>West Virginia</option>
	<option value="Wisconsin" <?php if(isset($_GET['entry_id'])): if($get_user['state'] == 'Wisconsin') echo 'selected="selected"'; endif;?>>Wisconsin</option>
	<option value="Wyoming" <?php if(isset($_GET['entry_id'])): if($get_user['state'] == 'Wyoming') echo 'selected="selected"'; endif;?>>Wyoming</option>
</select>
                  <input class="form-control" type="text" name="state" id="state_input" placeholder="Enter State / Province Name" value="<?php if(isset($_GET['entry_id'])): echo $get_user['state']; endif;?>" style=" <?php echo $style2; ?>">
                </div>
                <div class="form-group">
                  <label>City</label>
                 
                  <input class="form-control" type="text" name="city" placeholder="Enter City Name" value="<?php if(isset($_GET['entry_id'])): echo $get_user['city']; endif;?>">
                </div>
                <div class="form-group">
                  <label>Zip Code / Postal Code</label>
                  <input class="form-control" type="text" name="zip_code" placeholder="Enter Zip Code / Postal Code" value="<?php if(isset($_GET['entry_id'])): echo $get_user['zip_code']; endif;?>">
                </div>
                
                <div class="form-group">
                  <label>Email Address</label>
                  <input class="form-control" type="text" name="email_address" placeholder="Enter email address" value="<?php if(isset($_GET['entry_id'])): echo $get_user['email_address']; endif;?>">
                </div>
                <div class="form-group">
                  <label>Phone Number</label>
                  <input class="form-control" type="text" name="phone_number" placeholder="Enter Phone Number" value="<?php if(isset($_GET['entry_id'])): echo $get_user['phone_number']; endif;?>">
                </div>
                <div class="checkbox">
                  <label style="font-size:12px;">
                  <input name="is_subscribed" id="is_subscribedY" value="Y" type="radio"  <?php if(isset($_GET['entry_id'])): if($get_user['is_subscribed'] == 'Y') echo 'checked="checked"'; endif;?>><font>
                 Please let me know about the cool new stuff happening with my audio pets like what new Pets are coming
out, opportunities to win New Pets, stuff for my Pet, etc. </font> </label>
                </div>
                <div class="checkbox">
                  <label style="font-size:12px;">
                  <input name="is_subscribed" id="is_subscribedN" value="N" type="radio"  <?php if(isset($_GET['entry_id'])): if($get_user['is_subscribed'] == 'N') echo 'checked="checked"'; endif;?>><font>
                 I don’t want to know about the awesome, amazing things going on with My Audio Pet even if it could make a
happier more music filled life for my new Pet and I.</font> </label>
                </div>
               <font style="font-size:12px;">
                Your email address and other contact information will only be
                used to send you information about your purchase, your certificate,
                or other cool stuff going on with My Audio Pet. We will never
                sell your information for others to use, even if they offer a
                lot of money :-) </font></div>
               
                
                <div class="checkbox">
                  <label style="font-size:12px;">
                   <input name="is_admitted" id="is_admitted" value="Y" type="checkbox" >
                  If under 16 please acknowledge that you have parental or adult permission to apply for the adoption certificate.
                  </label>
                </div>
              
              <button type="submit" class="btn btn-primary" id="cmdSave" name="preview"> Submit </button>
              <button type="reset" class="btn btn-default" name="submit" > Reset </button><br><br>
              <?php if(isset($_GET['entry_id']) && !empty($_GET['entry_id']) ):  
				     $this_id = $_GET['entry_id'];?>
				    <a href="preview.php?entry_id=<?php echo $this_id; ?>" target="_blank">
					<button type="button" class="btn btn-primary" id="prv" name="preview" style="margin-right:10px;"> Preview Certificate </button></a>
				   
              <input type="hidden" name="id" value="<?php echo $id; ?>" />
              <?php endif; ?>
            </form>
          </div>
        </div>
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
<script type='text/javascript'>
        			$(document).ready(function()
        			{
        				$('#adminLogin').on('submit', function(e)
        				{
        					e.preventDefault();
        					$('#submitButton').attr('disabled', ''); 
        					/* disable upload button
        					 show uploading message
        					$('#output').html('<div class='alert alert-info' role='alert'>Submitting.. Please wait..</div>');
        					*/
                  
                  $('#output').html('<div >Submitting.. Please wait..</div>');
        					$(this).ajaxSubmit({
        					target: '#output',
        					success:  afterSuccess //call function after success
        					});
        				});
        			});
        			 
        			function afterSuccess()
        			{	
        				 
        				$('#submitButton').removeAttr('disabled'); //enable submit button
        			   
        			}
        			
        			$(function(){
        			
        			$(':file').filestyle({iconName: 'glyphicon-picture', buttonText: 'Select Photo'});
        			
        			});
        			</script>
<script>
 <?php if(isset($_GET['entry_id'])): if($get_user['under_18'] == 'Y' || $get_user['over_18'] == 'Y') ?>
  $(".form_div").show();
 <?php  endif;?>
$(".form_div").show();
if($("#under_18").prop('checked') == true){
    //do something
	 $('#show_hide').show();
}else{
    $('#show_hide').hide();
}

$("#under_18").change(function() {
    if($("#under_18").prop('checked') == true){
      $('#show_hide').show();
   }else{
      $('#show_hide').hide();
   }
   $(".form_div").show();
});

$("#over_18").change(function() {
  $('#show_hide').hide();
  $(".form_div").show();
});


// Check for Country
$("#country").change(function() {
   var selected_country =  $(this).val();
   if(selected_country == 'United States'){
      $('#state_drop').show();
	  $('#state_input').hide();
   }else{
      $('#state_drop').hide();
      $('#state_input').show();
   } 
});

	
</script>
<script>

$(document).ready(function(){ $(".submit").click(function(){ editor.post(); }); });
      $('.select2').select2({ placeholder : '' });

      $('.select2-remote').select2({ data: [{id:'A', text:'A'}]});

      $('button[data-select2-open]').click(function(){
        $('#' + $(this).data('select2-open')).select2('open');
      });
    </script>
</body>
</html>
