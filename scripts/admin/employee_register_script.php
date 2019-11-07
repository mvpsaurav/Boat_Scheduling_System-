<?php 
require "../../includes/admin/dbconnect.php";

$username=$_POST["user_name"];
$fullname=$_POST["full_name"];
$useremail=$_POST["user_email"];
$mobile_number=$_POST["mobile_number"];
$password=$_POST["password"];
$confirm_password=$_POST["confirm_password"];
$roleid=2;

if($confirm_password==$password)
{
  $hash_password=password_hash($password, PASSWORD_DEFAULT);
  $register_query="INSERT INTO users(username, roleid, password, email, mobilenumber,name,status) VALUES ('".$username."','".$roleid."','".$hash_password."','".$useremail."','".$mobile_number."','".$fullname."','1')";
  if($execute_query=mysqli_query($connect,$register_query))
  {
  	header("location: ../../modules/admin/employee_listing.php?register=success");
  }
}
else
{
    header("location: ../../modules/admin/employee_listing.php?password=didnotmatched");
}


?>