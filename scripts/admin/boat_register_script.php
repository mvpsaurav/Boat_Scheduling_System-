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
$status=3;
$createdat=date("Y-m-d h:m:s");
$boatlogo="";
$boatlogourl="";

  $register_query="INSERT INTO boatdetails(boatowner, boatname, boatnumber, personcapacity, weightcapacity,status,brandname,modelname,createdat,createdby,boatlogo,boatlogourl) 
  VALUES ('".$ownerid."','".$boatname."','".$boatnumber."','".$personcapacity."','".$weightcapacity."','".$status."','".$brandname."','".$modelname."','".$createdat."','".$created_by."','".$boatlogo."','".$boatlogourl."')";
  if($execute_query=mysqli_query($connect,$register_query))
  {
  	header("location: ../../modules/admin/boat_listing.php");
  }
else
{
	echo "error while uploading data";
    // header("location: ../modules/login.php?error=password_did_not_match");
}


?>