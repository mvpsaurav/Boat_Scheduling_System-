<?php 
require "../../includes/admin/dbconnect.php";
$username=$_POST["user_name"];
$fullname=$_POST["full_name"];
$useremail=$_POST["user_email"];
$mobile_number=$_POST["mobile_number"];
$password=$_POST["password"];
$confirm_password=$_POST["confirm_password"];
$aadaarnumber=$_POST["aadaarnumber"];
$pannumber=$_POST["pannumber"];
$gender=$_POST["gender"];
$bank_name=$_POST["bank_name"];
$account_number=$_POST["account_number"];
$account_name=$_POST["account_name"];
$ifsc=$_POST["ifsc"];
$address1=$_POST["address1"];
$address2=$_POST["address2"];
$zip_code=$_POST["zip_code"];
$country=$_POST["country"];
$state=$_POST["state"];
$city=$_POST["city"];
// $roleid=3;
$updatedat=date("Y-m-d h:m:s");
// echo"<br>2019-10-09 05:24:05";
$createdby=1;
$profilepicture="";
$profilepictureurl="";
// $status=3;
// if($confirm_password==$password)
// {
//   $edit_query="UPDATE users SET username='".$username."', password= '".$password."', email= '".$useremail."', mobilenumber='".$mobile_number."',name='".$fullname."' WHERE userid=".$userid;
//   if($execute_query=mysqli_query($connect,$edit_query))
//   {
//   	header("location: ../../modules/admin/employee_listing.php");
//   }
// }
// else
// {
// 	echo "password did not match";
//     // header("location: ../modules/login.php?error=password_did_not_match");
// }


?>