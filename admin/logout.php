<?php include_once('../common.php');
// Update the last login for this admin
$sql = execute_query("UPDATE ".ADMIN." SET last_login='".date('Y-m-d h:i:s')."' WHERE id=".$_SESSION['admin_id']." ");
// Unset the session
unset($_SESSION['admin_id']);
session_destroy();
header('Location: login.php');
exit();
?>