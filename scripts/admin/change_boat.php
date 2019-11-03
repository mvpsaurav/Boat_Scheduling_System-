<?php 
require"../../includes/admin/dbconnect.php";
$boatid=$_POST['boatid'];
$date=date("Y-m-d");
$select_trip_query="SELECT * FROM trips WHERE boatid=".$boatid." && tripdate='".$date."'";
$execute_select_trip_query=mysqli_query($connect,$select_trip_query);
$row_count=mysqli_num_rows($execute_select_trip_query);
if($row_count>0)
{
    while($tripdata=mysqli_fetch_assoc($execute_select_trip_query))
    {
        $maxtrip_count=$tripdata['tripnumber'];
        $maxtrip_id=$tripdata['tripid'];
        $current_available_ticket=$tripdata['availableseats'];
    }
}
else
{
    $maxtrip_count=0;
}
if($maxtrip_count==0)
{
    $select_boat_details_query="SELECT personcapacity,boatnumber FROM boatdetails WHERE boatid=".$boatid;
    $execute_select_boat_details_query=mysqli_query($connect,$select_boat_details_query);
    $boat_data=mysqli_fetch_assoc($execute_select_boat_details_query);
    echo "<input type='text' name='boatnumber' value='".$boat_data['boatnumber']."' readonly>&<input type='text' name='availableseats' value='".$boat_data['personcapacity']."' readonly>&<input type='text' name='tripid' value='' readonly hidden>";
}
elseif($maxtrip_count>0)
{
    $select_boat_details_query="SELECT personcapacity,boatnumber FROM boatdetails WHERE boatid=".$boatid;
    $execute_select_boat_details_query=mysqli_query($connect,$select_boat_details_query);
    $boat_data=mysqli_fetch_assoc($execute_select_boat_details_query);
    echo "<input type='text' name='boatnumber' value='".$boat_data['boatnumber']."' readonly>&<input type='text' name='availableseats' value='".$current_available_ticket."' readonly>&<input type='text' name='tripid' value='".$maxtrip_id."' readonly hidden>";
}


?>