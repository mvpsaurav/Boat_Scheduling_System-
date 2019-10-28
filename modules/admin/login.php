<?php include"../../includes/admin/layout/head.php";
if(!empty($_SESSION['userid']))
{
    if($_SESSION['userrole']<=2)
	{
	    header("location: bo_listing.php");
	}
}
?>

<div class="login_form_body">
	<div class="login_form_wrapper">
		<div id="admin_login_header">
		Admin Login
		</div>
<!-------- Code starts from here------------->
<form action="../../scripts/admin/login_script.php" method="post">
<label>User Name</label><input type="text" name="user_name">
<label>Password</label><input type="password" name="password">
<button type="submit">Login</button>
</form>
	</div>
</div>

<!------------- Code ends here------------->
<?php include"../../includes/admin/layout/footer.php";?>