<?php 
$DBname="boat_token_system";
$DBserver="localhost";
$DBusername="root";
$DBpassword="";
$connect = new mysqli($DBserver, $DBusername, $DBpassword,$DBname);
if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
} 
?>