<?php include"../../includes/bo/layout/head.php";
// echo$roleid= $_SESSION['userrole'];
if(!empty($_SESSION['userid']))
{   
	$roleid= $_SESSION['userrole'];
    if($roleid==3)
	{
	    header("location: boat_listing.php");
	}
}
?>

<!-------- Code starts from here------------->
<form action="../../scripts/bo/login_script.php" method="post">
user name:<input type="text" name="user_name">
<br>user password:<input type="password" name="password">
<br><button type="submit">Login</button>
</form>


<!------------- Code ends here------------->
<?php include"../../includes/bo/layout/footer.php";?>