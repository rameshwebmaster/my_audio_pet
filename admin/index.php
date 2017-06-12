<?php include_once("header.php");
$result = execute_query("SHOW COLUMNS FROM ".SETTINGS." LIKE 'is_updated'");
$exists = num_rows($result);
if(!$exists) {
   execute_query("ALTER TABLE ".SETTINGS."  ADD `is_updated` VARCHAR(10) NOT NULL  AFTER `data_updating_time`");
}
?>
         <!-- /. NAV SIDE  -->
         <div id="page-wrapper">
             <div id="page-inner">
                 <div class="row">
                     <div class="col-md-12">
                         <h1 class="page-head-line">Admin Area</h1>
                         <h1 class="page-subhead-line"><i class="fa fa-hand-o-left"></i> Use left menu to manage the site. </h1>
                     </div>
                 </div>
                 <!-- /. ROW  -->
                 

             </div>
             <!-- /. PAGE INNER  -->
         </div>
         <!-- /. PAGE WRAPPER  -->
     
      <!-- /. FOOTER  -->
    <?php include_once('footer.php');?>
 <?php echo evaluate_form_script(adminLogin, submitButton, output); ?>

 </body>
 </html>
 