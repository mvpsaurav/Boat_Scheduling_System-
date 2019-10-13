<?php 
require "../../includes/admin/dbconnect.php";
$deleteid=$_GET['id'];

  $delete_query="UPDATE boatdetails SET status='2' WHERE boatid=".$deleteid;
  if($execute_query=mysqli_query($connect,$delete_query))
  {
  	header("location: ../../modules/admin/boat_listing.php");
  }

?>