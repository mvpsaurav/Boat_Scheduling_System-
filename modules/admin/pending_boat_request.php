<?php 
require"../../includes/admin/dbconnect.php";
$id=$_POST['id'];
$request_userdata_query="SELECT * FROM boatdetails WHERE boatid=".$id;
$execute_request_userdata=mysqli_query($connect,$request_userdata_query);
$result=mysqli_fetch_assoc($execute_request_userdata);
echo"<pre>";
print_r($result);
echo"</pre>";


echo"<button type='submit' class='btn btn-dark' onclick='approve(".$result["boatid"].")'>Approve Request</button>";
echo"<button type='submit' class='btn btn-dark' onclick='decline(".$result["boatid"].")'>Decline Request</button>";
?>


<script>
    function approve(id)
    {
        $.ajax({
		type:"POST",
		url:"../../scripts/admin/approveboatrequest.php",
		data:"id="+id,
		success:function(approve_request)
		{
            Swal.fire({
            position: 'top-end',
            type: 'success',
            title: 'Request Approved Successfully',
            showConfirmButton: false,
            timer: 1200
            })
		}

         })
        setInterval('location.reload()', 1350);
    }
     function decline(id)
    {
            $.ajax({
            type:"POST",
            url:"../../scripts/admin/declineboatrequest.php",
            data:"id="+id,
            success:function(approve_request)
            {
                Swal.fire({
                position: 'top-end',
                type: 'success',
                title: 'Request Declined Successfully',
                showConfirmButton: false,
                timer: 1200
                })
            }

            })
        setInterval('location.reload()', 1350);
    }


</script>
