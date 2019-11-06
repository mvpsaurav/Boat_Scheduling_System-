<?php 
include "../../includes/admin/dbconnect.php";
$username=$_POST["user_name"];
$password=$_POST["password"];
$login_query="SELECT * FROM users WHERE username='".$username."' && status = 1";
$execute_query=mysqli_query($connect,$login_query);
$count_rows=mysqli_num_rows($execute_query);
$result_data=mysqli_fetch_assoc($execute_query);
$password_check=password_verify($password,$result_data['password']);
if($password_check==true)
{   
    
    if($result_data['roleid'] < 3)
    {
        session_start();
        $_SESSION['userid']=$result_data['userid'];
        $_SESSION['username']=$result_data['username'];
        $_SESSION['userrole']=$result_data['roleid'];    
        header('location:  ../../modules/admin/bo_listing.php');	
    }
    else
    {
        header('location:  ../../modules/admin/login.php?error=not_allowed_to_login_as_admin');
    }
}
else
{
    header('location:  ../../modules/admin/login.php?error=wrongpassword');
}

?>