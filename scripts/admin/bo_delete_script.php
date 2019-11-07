<?php 
require "../../includes/admin/dbconnect.php";
$userid=$_GET['id'];

   $delete_query="UPDATE boatowner SET status='2' WHERE id=".$userid;
  if($execute_query=mysqli_query($connect,$delete_query))
  {
  	header("location: ../../modules/admin/bo_listing.php");
  }

?>