<?php 
require"../../includes/admin/dbconnect.php";
$journeyto=$_POST['journeyto'];
$journeyfrom=$_POST['journeyfrom'];
$get_port_query="SELECT boatid FROM boat_route WHERE portid='".$journeyfrom."' && status=1 ";
$get_port_query2="SELECT boatid FROM boat_route WHERE portid='".$journeyto."' && status=1";
$execute_get_port_query=mysqli_query($connect,$get_port_query);
$execute_get_port_query2=mysqli_query($connect,$get_port_query2);
$date=date("Y-m-d");
if(!empty($journeyto || $journeyfrom ))
{
    
    while($result=mysqli_fetch_assoc($execute_get_port_query))
    {   
    $journeyfromboat[]=$result['boatid'];
    
    }
    while($result=mysqli_fetch_assoc($execute_get_port_query2))
    {   
        $journeytoboat[]=$result['boatid'];
    }
    foreach($journeyfromboat as $startingport)
    {
        foreach($journeytoboat as $endingport)
        {
            if($startingport == $endingport)
            {
                $boats[]=$endingport;
            }
        }
    }
    echo"<option value=''>Select Boat</option>";
    foreach ($boats as $boat )
    {  
        $get_boat_name_query="SELECT boatname FROM boatdetails WHERE boatid=".$boat;
        $boatname=mysqli_fetch_assoc(mysqli_query($connect,$get_boat_name_query));
        echo"<option value='".$boat."'>".$boatname['boatname']."</option>";
    }
    
    }
