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
$port=$_POST['port'];
$boatid=$_POST['boatid'];
$edit_query="UPDATE boatdetails SET 
  boatowner='".$ownerid."', boatname='".$boatname."', boatnumber='".$boatnumber."', personcapacity='".$personcapacity."',weightcapacity='".$weightcapacity."',brandname='".$brandname."',modelname='".$modelname."',  updatedat='".$updatedat."',updatedby='".$updatedby."',boatlogo='".$boatlogo."',boatlogourl='".$boatlogourl."' WHERE boatid=".$boatid;
if($execute=mysqli_query($connect,$edit_query))
{
  $select_boat_schedule_query="SELECT * FROM boatschedule WHERE boatid=".$boatid;
  $select_boat_route_query="SELECT * FROM boat_route WHERE boatid=".$boatid;
  $execute_select_boat_schedule_query=mysqli_query($connect,$select_boat_schedule_query);
  $execute_select_boat_route_query=mysqli_query($connect,$select_boat_route_query);
  // echo "<pre>";
  // print_r($time);
  // echo "</pre>";
  // echo "<pre>";
  while($boat_schedule_data=mysqli_fetch_assoc($execute_select_boat_schedule_query))
  {
    $oldtime[]=$boat_schedule_data;
  }
  // echo "</br>";
  // echo "</pre>";
  // echo "<pre>";
  while($boat_route_data=mysqli_fetch_assoc($execute_select_boat_route_query))
  {
    $oldroute[]=$boat_route_data;
  }
  // echo "</pre>";
  // echo "<pre>";
  // print_r($oldtime);
  // echo "</pre>";
  for($a=0;$a<6;$a++)
  {
    $newtime[]=array("id"=>$oldtime[$a]['id'],"boatid"=>$oldtime[$a]['boatid'],"day"=>$oldtime[$a]['day'],"departuretime"=>$time[$a+1][0],"arrivaltime"=>$time[$a+1][1]);
  }
  // echo "<pre>";
  // print_r($newarray);
  // echo "</pre>";



  // for($a=1;$a<=7;$a++)
  // {
  //  $boatschedule_query="INSERT INTO boatschedule (boatid,day,departuretime,arrivaltime) VALUES ('".$boatid."','".$a."','".$time[$a][0]."','".$time[$a][1]."');";
  //  $execute_boatschedule_query=mysqli_query($connect,$boatschedule_query);        
  // }
  // foreach($port as $data)
  // {
  //   $port_query="INSERT INTO boat_route (boatid,portid) VALUES ('".$boatid."','".$data."')";
  //   $execute_port_query=mysqli_query($connect,$port_query);        
  // }
  //  header("location: ../../modules/admin/boat_listing.php");

}

?>