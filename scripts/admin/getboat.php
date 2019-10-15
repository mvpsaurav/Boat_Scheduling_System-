<?php 
require"../../includes/admin/dbconnect.php";
$journeyto=$_POST['journeyto'];
$journeyfrom=$_POST['journeyfrom'];
$get_port_query="SELECT boatid FROM boat_route WHERE portid='".$journeyfrom."'";
$get_port_query2="SELECT boatid FROM boat_route WHERE portid='".$journeyto."'";
$execute_get_port_query=mysqli_query($connect,$get_port_query);
$execute_get_port_query2=mysqli_query($connect,$get_port_query2);

while($result=mysqli_fetch_assoc($execute_get_port_query))
{   
   $journeyfromboat[]=$result['boatid'];
  
}
// print_r($journeyfromboat);
while($result=mysqli_fetch_assoc($execute_get_port_query2))
{   
    $journeytoboat[]=$result['boatid'];
}
// print_r($journeytoboat);
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
foreach($boats as $boat)
{
$getboatname_query="SELECT boatname,boatid FROM boatdetails WHERE boatid='".$boat."'";
$execute_getboatname_query=mysqli_query($connect,$getboatname_query);
$result=mysqli_fetch_assoc($execute_getboatname_query);
echo $result['boatname'];

}