<?php 
require"../../includes/admin/dbconnect.php";
$journeyto=$_POST['journeyto'];
$journeyfrom=$_POST['journeyfrom'];
$get_port_query="SELECT boatid FROM boat_route WHERE portid='".$journeyfrom."' && status=1 ";
$get_port_query2="SELECT boatid FROM boat_route WHERE portid='".$journeyto."' && status=1";
$execute_get_port_query=mysqli_query($connect,$get_port_query);
$execute_get_port_query2=mysqli_query($connect,$get_port_query2);
$date=date("Y-m-d");
if(!empty($journeyto))
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
    // $boats is the array that conatins boatid of all of the boats that will go through the route
    foreach($boats as $boat)
    {
        $select_trip_query="SELECT * FROM trips WHERE boatid=".$boat." && tripdate='".$date."'";
        $execute_select_trip_query=mysqli_query($connect,$select_trip_query);
        $trip_row_count=mysqli_num_rows($execute_select_trip_query);
        //if there are existing trips,then we get total trips of all boats in an array
        if($trip_row_count != 0)
        {
            while($trip=mysqli_fetch_assoc($execute_select_trip_query))
            {   
                $tripdata[]=$trip;
            }
        }
        //if there are no existing trips,then we create an array of boats which has only one trip(tripnumber = 0).
        elseif($trip_row_count == 0)
        {
            $select_seats_query="SELECT personcapacity FROM boatdetails WHERE boatid='".$boat."'";
            $execute_select_seats_query=mysqli_query($connect,$select_seats_query);
            $data=mysqli_fetch_assoc($execute_select_seats_query);
            $currenttrip[]=array("boatid"=>$boat,"availableseats"=>$data['personcapacity'],"tripnumber"=>0,"tripid"=>"");
        }
    }

    if(!empty($tripdata))
    {
    $count=count($tripdata);
    //we create an array to check how many trips of every boat is occured in the array(tripdata).
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
    //array(currenttrip) has the latest trip of all the boats in unsorted manner.
    foreach($currenttrip as $trip)
    {
        //this is to get the tickets of only the latest trip of the boats.
        $select_ticket_query="SELECT count(*),boatid FROM unreserved_ticket_log WHERE tripid='".$trip['tripid']."' && boatid='".$trip['boatid']."'" ;
        if($execute_select_ticket_query=mysqli_query($connect,$select_ticket_query))
        {
            while($ticket=mysqli_fetch_assoc($execute_select_ticket_query))
            {
                $ticketdata[]=$ticket;
            }
        }
    }
    $count=count($currenttrip);
    for($a=0;$a<$count;$a++)
    {
        $master_data[]=array("boatid"=>$currenttrip[$a]['boatid'],"availableseats"=>$currenttrip[$a]['availableseats'],"tripnumber"=>$currenttrip[$a]['tripnumber'],"tripid"=>$currenttrip[$a]['tripid'],"ticketcount"=>$ticketdata[$a]['count(*)']);
    }
    // print_r($master_data);
    $array_count=count($master_data);
    $temp=0;
    //shorting the array of boats with respect to trip number in ascending order using bubbleshort.
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
    $array;
    // print_r($master_data);
    //to get the maximum tripnumber in the array.
    foreach($master_data as $data)
    {
        $maxtripnumbercount=$data['tripnumber'];
    }
    for($a=0;$a<=$maxtripnumbercount;$a++)
    {   
        foreach($master_data as $boat)
        {   
            if($a==$boat['tripnumber'])
            {
                $array[$a][]=$boat;
            }
        }
    }
    // print_r($array);
    //for shorting array with respect to trips.
    for($a=0;$a<=$maxtripnumbercount;$a++)
    {
        if(!empty($array[$a]))
        {
            $triparray_count=count($array[$a]);
            if($triparray_count>1)
            {
                for($c=0;$c<$triparray_count;$c++)
                {
                    for($d=0;$d<$triparray_count-1;$d++)
                    {
                        if($array[$a][$d]['ticketcount']>$array[$a][$d+1]['ticketcount'])
                            {
                                $temp=$array[$a][$d];
                                $array[$a][$d]=$array[$a][$d+1];
                                $array[$a][$d+1]=$temp;
                            }
                    }
                }
            }
        }
        
    }
    // print_r($array);
    for($a=0;$a<=count($array);$a++)
    {
        if(!empty($array[$a]))
        {
            for($b=0;$b<count($array[$a]);$b++)
            {

                    $newmaster[]=$array[$a][$b];
            }
        }
    }
    // print_r($newmaster);

    foreach($newmaster as $boat)
    {
        $getboatdetails_query="SELECT boatname,boatnumber FROM boatdetails WHERE boatid=".$boat['boatid'];
        $execute_getboatdetails_query=mysqli_query($connect,$getboatdetails_query);
        $boat_data=mysqli_fetch_assoc($execute_getboatdetails_query);
        echo "<option value='".$boat['boatid']."'>".$boat_data['boatname']."</option>";
    }
        $getfirstboatdetails_query="SELECT boatname,boatnumber FROM boatdetails WHERE boatid=".$newmaster[0]['boatid'];
        $execute_getboatdetails_query=mysqli_query($connect,$getfirstboatdetails_query);
        $boat_data=mysqli_fetch_assoc($execute_getboatdetails_query);
        echo "&<input type='text' name='boatnumber' value='".$boat_data['boatnumber']."' readonly>&<input type='text' name='availableseats' value='".$newmaster[0]['availableseats']."' readonly>&<input type='text' name='tripid' value='".$newmaster[0]['tripid']."' readonly hidden>";
        // echo"&".$newmaster[0]['boatid']."&".$newmaster[0]['availableseats']."&".$newmaster[0]['tripnumber']."&".$newmaster[0]['tripid']."&".$newmaster[0]['ticketcount']."&".$boat_data['boatnumber'];

}
