<?php 
require "../../includes/admin/dbconnect.php";
session_start();
$logo_directory="../../includes/bo/boat_logo/";
$updatedby=$_SESSION['userid'];
$ownerid=$_POST["boid"];
$boatname=$_POST["boatname"];
$boatnumber=$_POST["boatnumber"];
$personcapacity=$_POST["personcapacity"];
$weightcapacity=$_POST["weightcapacity"];
$brandname=$_POST["brandname"];
$modelname=$_POST["modelname"];
$updatedat=date("Y-m-d h:m:s");
$logo_time=date("hms");
$logo_data=$_FILES['boat_logo'];
$boatlogo=$logo_data['name'];
$logo_tmp_name=$logo_data['tmp_name'];
$logo_type=$logo_data['type'];
$boatlogourl="";
$time=$_POST['time'];
$port=$_POST['port'];
$boatid=$_POST['boatid'];
if(!empty($boatname || $boatnumber ))
{
  if(!is_dir($logo_directory))
  {
    mkdir($logo_directory,0700);
  }
  $boatlogourl=$logo_directory.$logo_time.$ownerid.$boatlogo;
  if(move_uploaded_file($logo_tmp_name,$boatlogourl))
  {  
    $edit_query="UPDATE boatdetails SET 
    boatowner='".$ownerid."', boatname='".$boatname."', boatnumber='".$boatnumber."', personcapacity='".$personcapacity."',weightcapacity='".$weightcapacity."',brandname='".$brandname."',modelname='".$modelname."',  updatedat='".$updatedat."',updatedby='".$updatedby."',boatlogo='".$boatlogo."',boatlogourl='".$boatlogourl."' WHERE boatid=".$boatid;
  }
  else
  {
    $edit_query="UPDATE boatdetails SET 
    boatowner='".$ownerid."', boatname='".$boatname."', boatnumber='".$boatnumber."', personcapacity='".$personcapacity."',weightcapacity='".$weightcapacity."',brandname='".$brandname."',modelname='".$modelname."',  updatedat='".$updatedat."',updatedby='".$updatedby."' WHERE boatid=".$boatid;
  }
  if($execute=mysqli_query($connect,$edit_query))
  {
    $select_boat_schedule_query="SELECT * FROM boatschedule WHERE boatid=".$boatid;
    $select_boat_route_query="SELECT * FROM boat_route WHERE boatid=".$boatid;
    $execute_select_boat_schedule_query=mysqli_query($connect,$select_boat_schedule_query);
    $execute_select_boat_route_query=mysqli_query($connect,$select_boat_route_query);
  
    while($boat_schedule_data=mysqli_fetch_assoc($execute_select_boat_schedule_query))
    {
      $oldtime[]=$boat_schedule_data;
    }
    
    while($boat_route_data=mysqli_fetch_assoc($execute_select_boat_route_query))
    {
      $oldroute[]=$boat_route_data;
    }
   
    for($a=0;$a<6;$a++)
    {
      $newtime[]=array("id"=>$oldtime[$a]['id'],"boatid"=>$oldtime[$a]['boatid'],"day"=>$oldtime[$a]['day'],"departuretime"=>$time[$a+1][0],"arrivaltime"=>$time[$a+1][1]);
      $update_boat_schedule_query="UPDATE boatschedule SET departuretime='".$newtime[$a]['departuretime']."' , arrivaltime='".$newtime[$a]['arrivaltime']."' WHERE id=".$newtime[$a]['id'];
      $execute_update_boat_schedule_query=mysqli_query($connect,$update_boat_schedule_query);
    }
  
    $oldroute_count=count($oldroute);
    $newroute_count=count($port);
    if($oldroute_count>$newroute_count)
    {
      foreach($oldroute as $oldportdata)
      { 
        $count=0;
        foreach($port as $newportdata)
        {
          if($newportdata==$oldportdata['portid'])
          {
            $count++;
          }
        }
        if($count==0)
        {
          $update_boat_rout_query="UPDATE boat_route SET status=2 WHERE routeid=".$oldportdata['routeid'];
          $execute_update_boat_rout_query=mysqli_query($connect,$update_boat_rout_query);
        }
      }
    }
    elseif($oldroute_count<$newroute_count)
    {
      foreach($port as $newportdata)
      { 
        $count=0;
        foreach($oldroute as $oldportdata)
        {
          if($newportdata==$oldportdata['portid'])
          {
            $count++;
          }
        }
        if($count==0)
        {
          $insert_boat_rout_query="INSERT INTO boat_route (boatid,portid,status) VALUES ('".$boatid."','".$newportdata."',1)";
          $execute_insert_boat_rout_query=mysqli_query($connect,$insert_boat_rout_query);
        }
      }
    }
  
     header("location: ../../modules/admin/boat_listing.php");
  
  }
}

?>