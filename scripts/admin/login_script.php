<?php 
include "../../includes/admin/dbconnect.php";
$username=$_POST["user_name"];
$password=$_POST["password"];
$login_query="SELECT * FROM users WHERE username='".$username."'";
$execute_query=mysqli_query($connect,$login_query);
$count_rows=mysqli_num_rows($execute_query);
$result_data=mysqli_fetch_assoc($execute_query);
if($result_data['password']==$password)
{
    session_start();
    $_SESSION['userid']=$result_data['userid'];
    $_SESSION['username']=$result_data['username'];
    $_SESSION['userrole']=$result_data['roleid'];
    if($_SESSION['userrole']==1)
    {
	    header('location:  ../../modules/admin/bo_listing.php');	
    }
	else
	{
		header('location:  ../../index.php');
	}
}
else
{
    header('location:  ../../modules/admin/login.php?error=wrongpassword');
}

?>