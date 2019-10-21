<?php 
$roleid=$_SESSION['userrole'];
if($roleid<2)
{
    header('location:  ../../modules/bo/login.php?error=notloggendin');
}
?>