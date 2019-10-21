<?php 
$DBname="boat_token_system";
$DBserver="localhost";
$DBusername="root";
$DBpassword="";
// $DBname="epiz_24608893_boat_token_system";
// $DBserver="sql302.epizy.com";
// $DBusername="epiz_24608893";
// $DBpassword="testadmin";
$connect = new mysqli($DBserver, $DBusername, $DBpassword,$DBname);
if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
} 
?>