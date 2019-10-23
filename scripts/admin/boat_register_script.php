<?php 
require "../../includes/admin/dbconnect.php";
session_start();
$created_by=$_SESSION['userid'];
$ownerid=$_POST["bo_id"];
$boatname=$_POST["boatname"];
$boatnumber=$_POST["boatnumber"];
$personcapacity=$_POST["personcapacity"];
$weightcapacity=$_POST["weightcapacity"];
$brandname=$_POST["brandname"];
$modelname=$_POST["modelname"];
$status=1;
$createdat=date("Y-m-d h:m:s");
$boatlogo="";
$boatlogourl="";
$time=$_POST['time'];
  $register_query="INSERT INTO boatdetails(boatowner, boatname, boatnumber, personcapacity, weightcapacity,status,brandname,modelname,createdat,createdby,boatlogo,boatlogourl) 
  VALUES ('".$ownerid."','".$boatname."','".$boatnumber."','".$personcapacity."','".$weightcapacity."','".$status."','".$brandname."','".$modelname."','".$createdat."','".$created_by."','".$boatlogo."','".$boatlogourl."');";
  $get_id_query="SELECT LAST_INSERT_ID();";
  if($execute_query=mysqli_query($connect,$register_query))
  { 
    $execute_get_id_query=mysqli_query($connect,$get_id_query);
    $data=mysqli_fetch_assoc($execute_get_id_query);
    $boatid=$data['LAST_INSERT_ID()']; 
      for($a=1;$a<=7;$a++)
      {
       $boatschedule_query="INSERT INTO boatschedule (boatid,day,departuretime,arrivaltime) VALUES ('".$boatid."','".$a."','".$time[$a][0]."','".$time[$a][1]."');";
       $execute_boatschedule_query=mysqli_query($connect,$boatschedule_query);        
      }
     	header("location: ../../modules/admin/boat_listing.php");
  }
else
{
	echo "error while uploading data";
    // header("location: ../modules/login.php?error=password_did_not_match");
}


?>