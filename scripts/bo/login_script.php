<?php 
include "../../includes/admin/dbconnect.php";
$username=$_POST["user_name"];
$password=$_POST["password"];
$login_query="SELECT * FROM boatowner WHERE username='".$username."' && status=1";
$execute_query=mysqli_query($connect,$login_query);
$count_rows=mysqli_num_rows($execute_query);
$result_data=mysqli_fetch_assoc($execute_query);
if($count_rows!=0)
{
    if($result_data['password']==$password)
    {
        session_start();
        $_SESSION['userid']=$result_data['id'];
        $_SESSION['username']=$result_data['username'];
        $_SESSION['userrole']=$result_data['roleid'];
        if($_SESSION['userrole']==3)
        {
            header('location:  ../../modules/bo/boat_listing.php');	
        }
        else
        {
            // header('location:  ../../index.php');
            echo "userrole not boat owner";
        }
    }
    else
    {
        header('location:  ../../modules/bo/login.php?error=wrongpassword');
    }
}
else
{
    header('location:  ../../modules/bo/login.php?error=no_user_found');
}
?>