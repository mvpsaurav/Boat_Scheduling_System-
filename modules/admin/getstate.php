<?php
require"../../includes/admin/dbconnect.php";
$country_id=$_POST['country_id'];
$getstate_query="SELECT * FROM state WHERE countryid=".$country_id;
$execute_getstate_query=mysqli_query($connect,$getstate_query);

echo"<option>Select State</option>";
while($result=mysqli_fetch_assoc($execute_getstate_query))
{
echo "<option value='".$result["stateid"]."'>".$result["statename"]."</option>";
}
?>