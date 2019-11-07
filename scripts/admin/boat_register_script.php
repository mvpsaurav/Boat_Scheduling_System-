<?php 
require "../../includes/admin/dbconnect.php";
session_start();
$logo_directory="../../includes/bo/boat_logo/";
$created_by=$_SESSION['userid'];
$ownerid=$_POST["bo_id"];
$boatname=$_POST["boatname"];
$boatnumber=$_POST["boatnumber"];
if(!empty($boatname || $boatnumber ))
{
  $personcapacity=$_POST["personcapacity"];
  $weightcapacity=$_POST["weightcapacity"];
  $brandname=$_POST["brandname"];
  $modelname=$_POST["modelname"];
  $status=1;
  $createdat=date("Y-m-d h:m:s");
  $logo_time=date("hms");
  $time=$_POST['time'];
  $port=$_POST['port'];
  $logo_data=$_FILES['boat_logo'];
  $boatlogo=$logo_data['name'];
  $logo_tmp_name=$logo_data['tmp_name'];
  $logo_type=$logo_data['type'];
  if(!is_dir($logo_directory))
  {
    mkdir($logo_directory,0700);
  }
  $boatlogourl=$logo_directory.$logo_time.$ownerid.$boatlogo;
  if(move_uploaded_file($logo_tmp_name,$boatlogourl))
  {
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
            foreach($port as $data)
            {
              $port_query="INSERT INTO boat_route (boatid,portid,status) VALUES ('".$boatid."','".$data."',1)";
              $execute_port_query=mysqli_query($connect,$port_query);        
            }
            header("location: ../../modules/admin/boat_listing.php");
        }
      else
      {
        echo "error while uploading data";
          // header("location: ../modules/login.php?error=password_did_not_match");
      }
  }
  else{
    echo "error while moving picture";
  }
}
else{
  header("location: ../../modules/admin/boat_listing.php?error=fieldsempty");
}


?>