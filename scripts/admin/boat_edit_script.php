<?php 
require "../../includes/admin/dbconnect.php";
session_start();
$updatedby=$_SESSION['userid'];
$ownerid=$_POST["boid"];
$boatname=$_POST["boatname"];
$boatnumber=$_POST["boatnumber"];
$personcapacity=$_POST["personcapacity"];
$weightcapacity=$_POST["weightcapacity"];
$brandname=$_POST["brandname"];
$modelname=$_POST["modelname"];
$updatedat=date("Y-m-d h:m:s");
$boatlogo="";
$boatlogourl="";
$time=$_POST['time'];
$edit_query="UPDATE boatdetails SET 
  boatowner='".$ownerid."', boatname='".$boatname."', boatnumber='".$boatnumber."', personcapacity='".$personcapacity."',weightcapacity='".$weightcapacity."',brandname='".$brandname."',modelname='".$modelname."',  updatedat='".$updatedat."',updatedby='".$updatedby."',boatlogo='".$boatlogo."',boatlogourl='".$boatlogourl."' WHERE boatid=".$_POST['boatid'];
if($execute=mysqli_query($connect,$edit_query))
{
	echo "done";

}

?>