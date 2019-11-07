<?php 
if(empty($_SESSION))
{
    header('location:  ../../modules/admin/login.php?error=notloggendin');
}
$roleid=$_SESSION['userrole'];
$url=$_SERVER['REQUEST_URI'];
if($roleid>2)
{
//write conditions for BoatOwners here
    header('location:  ../../modules/admin/login.php?error=notloggendin');
}
elseif($roleid == 2)
{
//write conditions for Employees here
    if($url == "/boat_token_system/modules/admin/employee_listing.php")
    {
    header('location:  bo_listing.php');
        
    }
}
elseif($roleid == 1)
{
//write conditions for Admin here


}
?>
