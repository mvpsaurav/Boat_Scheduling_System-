<?php
require"../../includes/admin/dbconnect.php";
$state_id=$_POST['state_id'];
$getcity_query="SELECT * FROM city WHERE stateid=".$state_id;
$execute_getcity_query=mysqli_query($connect,$getcity_query);

echo"<option>Select City</option>";
while($result=mysqli_fetch_assoc($execute_getcity_query))
{
echo "<option value='".$result["cityid"]."'>".$result["cityname"]."</option>";
}
?>