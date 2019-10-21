<?php 
require"../../includes/admin/dbconnect.php";
$id=$_POST['id'];
$request_userdata_query="SELECT * FROM boatowner WHERE id=".$id;
$execute_request_userdata=mysqli_query($connect,$request_userdata_query);
$result=mysqli_fetch_assoc($execute_request_userdata);
//echo"<pre>";
//print_r($result);
//echo"</pre>";
?>
<div class="row">
<div class="col"><label>User Name</label>
<p><?= $result['username'] ?></p></div>
<div class="col"><label>Name</label>
<p><?= $result['name'] ?></p></div>
<div class="col"><label>Email</label>
<p><?= $result['email'] ?></p></div>
</div>

<div class="row">
<div class="col"><label>Adhaar Number</label>
<p><?= $result['adhaarnumber'] ?></p></div>
<div class="col"><label>PAN Number</label>
<p><?= $result['pannumber'] ?></p></div>
<div class="col"><label>Mobile Number</label>
<p><?= $result['mobilenumber'] ?></p></div>
</div>

<div class="row">
<div class="col"><label>Gender</label>
<p><?= $result['gender']==1 ? "Male" : "";?>
    <?=  $result['gender']== 2 ? "Female" : "";?>
   <?= $result['gender']== 3 ? "other" : ""; ?></p></div>
<div class="col"><label>Bank Name</label>
<p><?= $result['bankname'] ?></p></div>
<div class="col"><label>IFSC Number</label>
<p><?= $result['ifsc'] ?></p></div>
</div>

<div class="row">
<div class="col"><label>Account Name</label>
<p><?= $result['accountname'] ?></p></div>
<div class="col"><label>Account Number</label>
<p><?= $result['accountnumber'] ?></p></div>
<div class="col"><label>Permanent Address</label>
<p><?= $result['addressline1'] ?></p></div>
</div>

<div class="row">
<div class="col"><label>Correspondence Address</label>
<p><?= $result['addressline2'] ?></p></div>
<div class="col"><label>City</label>
<p><?= $result['cityid'] ?></p></div>
<div class="col"><label>State</label>
<p><?= $result['stateid'] ?></p></div>
</div>

<div class="row">
<div class="col"><label>Country</label>
<p><?= $result['countryid'] ?></p></div>
<div class="col"><label>Zip Code</label>
<p><?= $result['zipcode'] ?></p></div>
    <div class="col"></div>
</div>







<?php

echo"<button type='submit' class='btn btn-dark' onclick='approve(".$result["id"].")'>Approve Request</button>";
echo"<button type='submit' class='btn btn-dark' onclick='decline(".$result["id"].")'>Decline Request</button>";
?>


<script>
    function approve(id)
    {
        $.ajax({
		type:"POST",
		url:"../../scripts/admin/approveborequest.php",
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
            url:"../../scripts/admin/declineborequest.php",
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
