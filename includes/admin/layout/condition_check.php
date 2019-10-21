<?php 
$roleid=$_SESSION['userrole'];
if($roleid>2)
{
    header('location:  ../../modules/admin/login.php?error=notloggendin');
}
?>