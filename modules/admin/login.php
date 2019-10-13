<?php include"../../includes/admin/layout/head.php";
if(!empty($_SESSION['userid']))
{
    header("location: bo_listing.php");
}
?>

<!-------- Code starts from here------------->
<form action="../../scripts/admin/login_script.php" method="post">
user name:<input type="text" name="user_name">
<br>user password:<input type="password" name="password">
<br><button type="submit">Login</button>
</form>


<!------------- Code ends here------------->
<?php include"../../includes/admin/layout/footer.php";?>