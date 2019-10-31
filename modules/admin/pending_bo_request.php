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
<div class="col"><label><b>User Name : </b></label>
<?= $result['username'] ?></div>
<div class="col"><label><b>Name : </b></label>
<?= $result['name'] ?></div>
</div>
<div class="row">
<div class="col"><label><b>Email : </b></label>
<?= $result['email'] ?></div>
<div class="col"><label><b>Aadhaar Number : </b></label>
<?= $result['adhaarnumber'] ?></div>
</div>

<div class="row">
<div class="col"><label><b>PAN Number : </b></label>
<?= $result['pannumber'] ?></div>
<div class="col"><label><b>Mobile Number : </b></label>
<?= $result['mobilenumber'] ?></div>
</div>

<div class="row">
<div class="col"><label><b>Gender : </b></label>
<?= $result['gender']==1 ? "Male" : "";?>
    <?=  $result['gender']== 2 ? "Female" : "";?>
   <?= $result['gender']== 3 ? "other" : ""; ?></div>
<div class="col"><label><b>Bank Name : </b></label>
<?= $result['bankname'] ?></div>
</div>
<div class="row">
<div class="col"><label><b>IFSC Number : </b></label>
<?= $result['ifsc'] ?></div>
<div class="col"><label><b>Account Name : </b></label>
<?= $result['accountname'] ?></div>
</div>

<div class="row">
<div class="col"><label><b>Account Name : </b></label>
<?= $result['accountname'] ?></div>
<div class="col"><label><b>Account Number : </b></label>
<?= $result['accountnumber'] ?></div>
</div>
<div class="row">
<div class="col"><label><b>Permanent Address : </b></label>
<?= $result['addressline1'] ?></div>
<div class="col"><label><b>Correspondence Address : </b></label>
<?= $result['addressline2'] ?></div>
</div>

<div class="row">
<div class="col"><label><b>City : </b></label>
<?= $result['cityid'] ?></div>
<div class="col"><label><b>State : </b></label>
<?= $result['stateid'] ?></div>
</div>
<div class="row">
<div class="col"><label><b>Country : </b></label>
<?= $result['countryid'] ?></div>
<div class="col"><label><b>Zip Code : </b></label>
<?= $result['zipcode'] ?></div>
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
