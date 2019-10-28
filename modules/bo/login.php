<?php include"../../includes/bo/layout/head.php";
// echo$roleid= $_SESSION['userrole'];
if(!empty($_SESSION['userrole']))
{   
	$roleid= $_SESSION['userrole'];
    if($roleid==3)
	{
	    header("location: boat_listing.php");
	}
}
?>

<div class="login_form_body">
	<div class="login_form_wrapper">
		<div id="bo_login_header">
		Boat Owner Login
		</div>
<!-------- Code starts from here------------->
<form action="../../scripts/bo/login_script.php" method="post">
<label>User Name</label><input type="text" name="user_name">
<label>Password</label><input type="password" name="password">
<button type="submit">Login</button>
</form>
</div>
</div>

<!------------- Code ends here------------->
<?php include"../../includes/bo/layout/footer.php";?>