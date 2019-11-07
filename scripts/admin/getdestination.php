<?php 
require"../../includes/admin/dbconnect.php";
$portid=$_POST['portid'];
$get_port_query="SELECT * FROM ports";
$execute_get_port_query=mysqli_query($connect,$get_port_query);
echo"<option value=''>Select Destination Station</option>";
while($result=mysqli_fetch_assoc($execute_get_port_query))
{
    if($result['portid']!=$portid)
    {
        echo "<option value='".$result['portid']."'>".$result['portname']."</option>";
    }
}