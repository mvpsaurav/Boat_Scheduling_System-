<?php session_start();
 if(empty($_SESSION['userid']))
{header('location: modules/admin/login.php');}?>

Loggedin
<?php
 if(!empty($_SESSION['userid']))
 {  
     echo "<a href='modules/logout.php'>Logout</a>";
 }
 ?>
