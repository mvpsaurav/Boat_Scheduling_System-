<?php 
require"../../includes/admin/dbconnect.php";
$journeyto=$_POST['journeyto'];
$journeyfrom=$_POST['journeyfrom'];
$get_port_query="SELECT boatid FROM boat_route WHERE portid='".$journeyfrom."' && status=1 ";
$get_port_query2="SELECT boatid FROM boat_route WHERE portid='".$journeyto."' && status=1";
$execute_get_port_query=mysqli_query($connect,$get_port_query);
$execute_get_port_query2=mysqli_query($connect,$get_port_query2);
$date=date("Y-m-d");

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
    $select_trip_query="SELECT * FROM trips WHERE boatid=".$boat." && tripdate='".$date."'";
    $execute_select_trip_query=mysqli_query($connect,$select_trip_query);
    $trip_row_count=mysqli_num_rows($execute_select_trip_query);
    if($trip_row_count != 0)
    {
        while($trip=mysqli_fetch_assoc($execute_select_trip_query))
        {   
            $tripdata[]=$trip;
        }
    }
    elseif($trip_row_count == 0)
    {
        $select_seats_query="SELECT personcapacity FROM boatdetails WHERE boatid='".$boat."'";
        $execute_select_seats_query=mysqli_query($connect,$select_seats_query);
        $data=mysqli_fetch_assoc($execute_select_seats_query);
        $currenttrip[]=array("boatid"=>$boat,"availableseats"=>$data['personcapacity'],"tripnumber"=>0,"tripid"=>"");
    }
}

// print_r($tripdata);
if(!empty($tripdat))
{
    $count=count($tripdata);
    for($a=0;$a<$count;$a++)
    {
        $tripcount=0;
        for($b=0;$b<$count;$b++)
        {
            if($tripdata[$a]['boatid']==$tripdata[$b]['boatid'])
            {
            $tripcount++;
            }
        }
        $tripcount_data[]=array("boatid"=>$tripdata[$a]['boatid'],"occured_count"=>$tripcount);
    }
    for($a=0;$a<$count;$a++)
    {
        for($b=0;$b<$count;$b++)
        {
            if($tripdata[$a]['boatid']==$tripdata[$b]['boatid'])
            {
                if($tripdata[$a]['tripnumber'] < $tripdata[$b]['tripnumber'])
                {  
                    // echo$tripdata[$a]['tripnumber'];
                    // echo$tripdata[$b]['tripnumber'];
                    $currenttrip[]=array("boatid"=>$tripdata[$b]['boatid'],"availableseats"=>$tripdata[$b]['availableseats'],"tripnumber"=>$tripdata[$b]['tripnumber'],"tripid"=>$tripdata[$b]['tripid']);
                }
                if($tripcount_data[$b]['occured_count']==1)
                {
                    $currenttrip[]=array("boatid"=>$tripdata[$b]['boatid'],"availableseats"=>$tripdata[$b]['availableseats'],"tripnumber"=>$tripdata[$b]['tripnumber'],"tripid"=>$tripdata[$b]['tripid']);
                }

            }
        }
    }
}
// elseif(empty($tripdata))
// {
//     $count=count($currenttrip);
// }

// print_r($tripcount_data);
foreach($currenttrip as $trip)
{
$select_ticket_query="SELECT count(*),boatid FROM unreserved_ticket_log WHERE tripid='".$trip['tripid']."' && boatid='".$trip['boatid']."'" ;
if($execute_select_ticket_query=mysqli_query($connect,$select_ticket_query))
{
    while($ticket=mysqli_fetch_assoc($execute_select_ticket_query))
    {
        $ticketdata[]=$ticket;
    }
}
}
// print_r($currenttrip);
// print_r($ticketdata);
$count=count($currenttrip);
for($a=0;$a<$count;$a++)
{
$master_data[]=array("boatid"=>$currenttrip[$a]['boatid'],"availableseats"=>$currenttrip[$a]['availableseats'],"tripnumber"=>$currenttrip[$a]['tripnumber'],"tripid"=>$currenttrip[$a]['tripid'],"ticketcount"=>$ticketdata[$a]['count(*)']);
}
// print_r($master_data);
$array_count=count($master_data);
$temp=0;
if($array_count>1)
{
    for($a=0;$a<$array_count;$a++)
    {
        for($b=0 ;$b<$array_count-$a-1;$b++)
        {
         
            if($master_data[$b]['tripnumber']>$master_data[$b+1]['tripnumber'])
            {
                $temp=$master_data[$b];
                $master_data[$b]=$master_data[$b+1];
                $master_data[$b+1]=$temp;
            }
        }
    }
}
print_r($master_data);

