<?php include_once("header.php");?>
<!-- /. NAV SIDE  -->
<?php //include_once("dashboard_icons.php"); 
		Listing_page_javascript(ouput, USERS);
		?>
<div id="page-wrapper">
  <div id="page-inner">
    <div class="row">
      <div class="col-md-12">
        <h1 class="page-head-line">Users List</h1>
        <h1 class="page-subhead-line"><i class="fa fa-hand-o-down"></i> List of all users.
          
        </h1>
      </div>
    </div>
    <!-- /. ROW  -->
    <div class="row">
      <div class="col-md-12 ">
        <div class="panel panel-info">
          <div class="panel-heading"> USERS LISTING  <a href="export.php"  class="btn btn-success" style="float:right" >Download  </a></div>
          <div class="panel-body">
            <div class="table-responsive">
            <div id="ouput"></div>
              <table class="table table-striped table-bordered table-hover">
                <thead>
                  <tr>
                    <th width="17"># </th>
                    <th width="138">First Name</th>
                    <th width="138">Last Name</th>
                    <th width="138">Have Pet</th>
                    <th width="154">City</th>
                    <th width="136">State</th>
                    <th width="175">Email Address</th>
                    <th width="113">View</th>
                    <th width="83">Options</th>
                  </tr>
                </thead>
                <tbody>
                 <?php 
				  // Get categories here
				  $sql_cats = execute_query("SELECT * FROM ".USERS." ORDER BY id DESC ");
				  $num_count = num_rows($sql_cats);
				  if($num_count < 1){
				 ?>
                 <tr><td colspan="9"><center><font color="red">No Data Found.</font></center></td></tr>
                 <?php }else{ ?>
                 <?php $i=1; while($user = fetch_assoc($sql_cats)):?>
                  <tr class="gradeX">
                    <td><?php echo $i; ?></td>
                    <td><?php echo $user['first_name']; ?></td>
                    <td><?php echo $user['last_name']; ?></td>
                    <td><?php echo $user['have_pet']; ?></td>
                    <td><?php echo $user['city']; ?></td>
                    <td><?php echo $user['state']; ?></td>
                    <td><?php echo $user['email_address']; ?></td>
                    <td>
                   
                   
                   <a title="View Certificate" href="../preview.php?entry_id=<?php echo $user['id'];?>" class="btn btn-default"><i class="glyphicon glyphicon-search"></i>View Certificate</a>                                    </td>
                    <td>
                    <a onclick="javascript:void(0)" id="<?php echo ($user['id']);?>" class="btn btn-danger delbutton" >Delete </a></td>
                  </tr>
                 <?php $i++; endwhile; }?>
                </tbody>
              </table>
            </div>
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

</body></html>
<script>
function in_progress(){
  alert('In Progress');
  return false;
}
</script>