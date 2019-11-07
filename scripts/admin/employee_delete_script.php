<?php 
require "../../includes/admin/dbconnect.php";
$userid=$_GET['id'];

  $delete_query="UPDATE users SET status='2' WHERE userid=".$userid;
  if($execute_query=mysqli_query($connect,$delete_query))
  {
  	header("location: ../../modules/admin/employee_listing.php");
  }

?>