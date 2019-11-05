<?php 
if(empty($_SESSION))
{
    header('location:  ../../modules/bo/login.php?error=notloggendin');
}
$roleid=$_SESSION['userrole'];
if($roleid<2)
{
    header('location:  ../../modules/bo/login.php?error=notloggendin');
}
?>