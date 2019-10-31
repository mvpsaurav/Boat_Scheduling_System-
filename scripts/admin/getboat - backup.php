<?php 
require"../../includes/admin/dbconnect.php";
$journeyto=$_POST['journeyto'];
$journeyfrom=$_POST['journeyfrom'];
$get_port_query="SELECT boatid FROM boat_route WHERE portid='".$journeyfrom."'";
$get_port_query2="SELECT boatid FROM boat_route WHERE portid='".$journeyto."'";
$execute_get_port_query=mysqli_query($connect,$get_port_query);
$execute_get_port_query2=mysqli_query($connect,$get_port_query2);
$date=date("Y-m-d");
$a=0;

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
// $boats is the array that conatins boatid of all of the boats that will go through the route
foreach($boats as $boat)
{
    // $getboatname_query="SELECT boatname,boatid FROM boatdetails WHERE boatid='".$boat."'";
    // $execute_getboatname_query=mysqli_query($connect,$getboatname_query);
    // $result=mysqli_fetch_assoc($execute_getboatname_query);
    // echo $result['boatname']."-";
    // echo $result['boatid']."-";
    $select_trip_query="SELECT * FROM trips WHERE boatid=".$boat." && tripdate='".$date."'";
    $execute_select_trip_query=mysqli_query($connect,$select_trip_query);
    $trip_row_count=mysqli_num_rows($execute_select_trip_query);
    if($trip_row_count != 0)
    {
        $trips_rouws_count=0;
        while($trip=mysqli_fetch_assoc($execute_select_trip_query))
        {   
            $trips_rouws_count++;
            $tripcount[]=array("boatid"=>$boat,"tripid"=>$trip['tripid'],"trips"=>$trips_rouws_count);
            $tripdata[]=$trip;
            $select_ticket_query="SELECT count(*) FROM unreserved_ticket_log WHERE tripid='".$trip['tripid']."' && boatid='".$boat."'" ;
            if($execute_select_ticket_query=mysqli_query($connect,$select_ticket_query))
            {
                $ticket_row_count=mysqli_num_rows($execute_select_ticket_query);
                if($ticket_row_count != 0)
                {
                    while($ticket=mysqli_fetch_assoc($execute_select_ticket_query))
                    {
                        $ticketdata[]=$ticket;
                    }
                }
                elseif($ticket_row_count == 0)
                {
                    echo "no ticket";
                }
            }
        }
    }
    elseif($trip_row_count == 0)
    {
        echo "no trip";
    }
}

if(!empty($tripdata))
{
    print_r($tripdata);
}
if(!empty($ticketdata))
{
    print_r($ticketdata);
}

print_r($tripcount);
foreach($tripcount as $a)
{
    foreach($tripcount as $b)
    {
        if($a['boatid']==$b['boatid'])
        {
            if($a['trips']<$b['trips'])
            {
                $currenttrip[]=$b['trips'];
            }
            elseif($b['trips']<$a['trips'])
            {   
                $currenttrip[]=$b['trips'];
            }
        }
    }
}
print_r($currenttrip);