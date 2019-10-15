<?php 
require"../../includes/admin/dbconnect.php";
$id=$_POST['id'];
$approve_bo_reuqest_query="UPDATE boatdetails SET status = 1 WHERE boatid=".$id;
$execute_approve_bo_reuqest=mysqli_query($connect,$approve_bo_reuqest_query);
?>