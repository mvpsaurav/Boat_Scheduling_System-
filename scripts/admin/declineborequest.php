<?php 
require"../../includes/admin/dbconnect.php";
$id=$_POST['id'];
$approve_bo_reuqest_query="UPDATE boatowner SET status = 2 WHERE id=".$id;
$execute_approve_bo_reuqest=mysqli_query($connect,$approve_bo_reuqest_query);
?>