<?php 
require "../../includes/admin/dbconnect.php";
$userid=$_POST['userid'];
$username=$_POST["user_name"];
$fullname=$_POST["full_name"];
$useremail=$_POST["user_email"];
$mobile_number=$_POST["mobile_number"];
$password=$_POST["password"];
$confirm_password=$_POST["confirm_password"];
$roleid=2;

if($confirm_password==$password)
{
  $edit_query="UPDATE users SET username='".$username."', password= '".$password."', email= '".$useremail."', mobilenumber='".$mobile_number."',name='".$fullname."' WHERE userid=".$userid;
  if($execute_query=mysqli_query($connect,$edit_query))
  {
  	header("location: ../../modules/admin/employee_listing.php");
  }
}
else
{
	echo "password did not match";
    // header("location: ../modules/login.php?error=password_did_not_match");
}


?>