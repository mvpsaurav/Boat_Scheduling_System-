<?php 
require "../../includes/admin/dbconnect.php";
$deleteid=$_GET['id'];

  $delete_boat_query="UPDATE boatdetails SET status='2' WHERE boatid=".$deleteid;
  if($execute_delete_boat_query=mysqli_query($connect,$delete_boat_query))
  {
    $delete_boat_route_query="UPDATE boat_route SET status='2' WHERE boatid=".$deleteid;
    if($execute_delete_boat_route_query=mysqli_query($connect,$delete_boat_route_query))
    {
      header("location: ../../modules/admin/boat_listing.php?delete=success");
    }
  }

?>