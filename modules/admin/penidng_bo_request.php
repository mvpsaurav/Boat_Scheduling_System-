<?php 
require"../../includes/admin/dbconnect.php";
$id=$_POST['id'];
$request_userdata_query="SELECT * FROM boatowner WHERE id=".$id;
$execute_request_userdata=mysqli_query($connect,$request_userdata_query);
$result=mysqli_fetch_assoc($execute_request_userdata);
echo"<pre>";
print_r($result);
echo"</pre>";


echo"<button type='submit' class='btn btn-dark' onclick='approve(".$result["id"].")'>Approve Request</button>";
echo"<button type='submit' class='btn btn-dark' onclick='decline(".$result["id"].")'>Decline Request</button>";
?>


<script>
    function approve(id)
    {
        alert("approve"+id);
    }
     function decline(id)
    {
        alert("decline"+id);        
    }


</script>
