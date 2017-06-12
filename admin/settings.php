<?php include_once("header.php");

$result = execute_query("SHOW COLUMNS FROM ".SETTINGS." LIKE 'is_updated'");
$exists = num_rows($result);
if(!$exists) {
   execute_query("ALTER TABLE ".SETTINGS."  ADD `is_updated` VARCHAR(10) NOT NULL  AFTER `data_updating_time`");
}
?>
<!-- /. NAV SIDE  -->

<div id="page-wrapper" style="min-height:500px !important">
  <div id="page-inner" style="min-height:500px !important">
    <div class="row">
      <div class="col-md-12">
        <h1 class="page-head-line">Setting Page</h1>
        <h1 class="page-subhead-line"><i class="fa fa-hand-o-down"></i>&nbsp;Fill out this form to set up the site. </h1>
      </div>
    </div>
    <!-- /. ROW  -->
    <div class="row">
      <div class="col-md-12 ">
        <div class="panel panel-info">
          <div class="panel-heading"> SETTINGS FORM </div>
          <div class="panel-body">
            <form id="adminLogin" action="<?php echo form_action();?>" autocomplete="Off" method="post" class="signin-form" enctype="multipart/form-data">
              <input type="hidden" name="do_action" value="settings">
              <div id="output"></div>
              <div class="form-group">
                <label>Panel Title </label>
                <input class="form-control" type="text" name="site_name" <?php palceholder('Enter Panel Title');?> value="<?php echo strip($row['site_name']);?>">
              </div>
              <div class="form-group">
                <label>Admin Logo </label>
                <input name="site_logo" type="file">
                <p class="help-block">Logo should be 64x64 </p>
                <input type="hidden" name="site_logo_old" value="<?php echo strip($row['site_logo']);?>">
                <br>
                <?php 
				if( !empty($row['site_logo']) ):
				?>
                <img src="../uploads/<?php echo $row['site_logo']; ?>" class="img-thumbnail">
                <?php endif; ?>
              </div>
             <!-- <div class="form-group">
                <label>Site URL </label>
                <input class="form-control" type="text" name="site_url" <?php palceholder('Enter Site URL');?> value="<?php echo strip($row['site_url']);?>">
              </div>-->
              <div class="form-group">
                <label>Currency Symbol</label>
                <br>
                <select name="currency_symbol" class="select2" style="width:100%;">
                  <option value="PKR" <?php if($row['currency_symbol'] == 'PKR') echo 'selected="selected"'; ?>>PKR</option>
                </select>
              </div>
              <!--
              
               <select name="currency_symbol" class="select2" style="width:100%;">
                  <option value="">Select Currency</option>
                  <option value="$" <?php if($row['currency_symbol'] == '$') echo 'selected="selected"'; ?>>Dollar (&#36;)</option>
                  <option value="€" <?php if($row['currency_symbol'] == '€') echo 'selected="selected"'; ?>>Euro (&#128;)</option>
                  <option value="£" <?php if($row['currency_symbol'] == '£') echo 'selected="selected"'; ?>>Pound Sterling (£)</option>
                  <option value="¥" <?php if($row['currency_symbol'] == '¥') echo 'selected="selected"'; ?>>Yen (&#165;)</option>
                </select><div class="form-group">
                <label>Site Status</label>
                <div class="radio">
                  <label class="col-md-2">
                  <input name="optionsRadios" id="optionsRadios1" value="option1" checked="" type="radio">
                 Up & Running </label>
                  <label class="col-md-2">
                  <input name="optionsRadios" id="optionsRadios1" value="option1" checked="" type="radio">
                  Under Construction </label>
                </div>
                
              </div>-->
              <div class="form-group">
                <label>Site Updated?</label>
                <br>
                <div class="checkbox">
                   <label>
                       <input name="is_updated" value="TRUE" type="checkbox" <?php if($row['is_updated'] == 'TRUE') echo 'checked="checked"';?>><font color="#0000FF">Tick if site is updated. Otherwise leave it blank.</font>
                   </label>
               </div>
              </div>
              <?php form_buttons();?>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /. PAGE INNER  -->
</div>
<!-- /. PAGE WRAPPER  -->
<!-- /. FOOTER  -->
<?php include_once('footer.php');?>
<?php echo evaluate_form_script(adminLogin, submitButton, output);?>
<script>
      $('.select2').select2({ placeholder : '' });

      $('.select2-remote').select2({ data: [{id:'A', text:'A'}]});

      $('button[data-select2-open]').click(function(){
        $('#' + $(this).data('select2-open')).select2('open');
      });
    </script>
</body></html>