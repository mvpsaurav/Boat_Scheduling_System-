<?php 
require"../../includes/admin/dbconnect.php";
$journeyto=$_POST['journeyto'];
$journeyfrom=$_POST['journeyfrom'];
$get_port_query="SELECT boatid FROM boat_route WHERE portid='".$journeyfrom."'";
$get_port_query2="SELECT boatid FROM boat_route WHERE portid='".$journeyto."'";
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
        echo "no trip";
    }
}

// if(!empty($tripdata))
// {
//     print_r($tripdata);
// }
// if(!empty($ticketdata))
// {
//     print_r($ticketdata);
// }
// print_r($tripcount);
// foreach($tripdata as $a)
// {
//     foreach($tripdata as $b)
//     {
//         if($a['boatid']==$b['boatid'])
//         {
//             if($a['tripid']!=$b['tripid'])
//             {
//                 if($a['tripnumber']<$b['tripnumber'])
//                 {
//                     $currenttrip[]=array("boatid"=>$b['boatid'],"availableseats"=>$b['availableseats'],"tripnumber"=>$b['tripnumber']);
//                 }
//                 // elseif($b['tripnumber']<$a['tripnumber'])
//                 // {   
//                 //     $currenttrip[]=array("boatid"=>$b['boatid'],"availableseats"=>$b['availableseats'],"tripnumber"=>$b['tripnumber']);
//                 // }
//             }
            
//         }
//     }
// }

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
            if($tripdata[$a]['tripnumber']<$tripdata[$b]['tripnumber'])
            {
                $currenttrip[]=array("boatid"=>$tripdata[$b]['boatid'],"availableseats"=>$tripdata[$b]['availableseats'],"tripnumber"=>$tripdata[$b]['tripnumber']);
            }
            if($tripcount_data[$b]['occured_count']==1)
            {
                $currenttrip[]=array("boatid"=>$tripdata[$b]['boatid'],"availableseats"=>$tripdata[$b]['availableseats'],"tripnumber"=>$tripdata[$b]['tripnumber']);
            }

        }
    }
}
print_r($currenttrip);
// print_r($tripcount_data);














// $select_ticket_query="SELECT count(*) FROM unreserved_ticket_log WHERE tripid='".$trip['tripid']."' && boatid='".$boat."'" ;
// if($execute_select_ticket_query=mysqli_query($connect,$select_ticket_query))
// {
//     $ticket_row_count=mysqli_num_rows($execute_select_ticket_query);
//     if($ticket_row_count != 0)
//     {
//         while($ticket=mysqli_fetch_assoc($execute_select_ticket_query))
//         {
//             $ticketdata[]=$ticket;
//         }
//     }
//     elseif($ticket_row_count == 0)
//     {
//         echo "no ticket";
//     }
// }