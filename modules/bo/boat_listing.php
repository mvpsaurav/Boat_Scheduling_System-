<?php
require"../../includes/bo/layout/head.php";
require"../../includes/bo/layout/condition_check.php";
require"../../includes/bo/layout/sidebar.php";
// require"../../includes/admin/layout/header.php";
require"../../includes/admin/dbconnect.php";

// $pending_query="SELECT * FROM boatdetails WHERE status = 3";
$listing_query="SELECT * FROM boatdetails WHERE status = 1 && boatowner=".$_SESSION['userid'];
$execute_query=mysqli_query($connect,$listing_query);
// $execute_pending_query=mysqli_query($connect,$pending_query);
// $check_rows_pending_query=mysqli_num_rows($execute_pending_query);
$index=1;
?>
<div class="col-10 header_container">
<h1 class=header_name>Boat</h1>
</div>
<div class="container">
    <div class="row">
            <div class="col">
            	<div class="add_button">
					<!-- <a href="employee_register.php" class="btn btn-dark">Add Employee</a> -->
					<button type="button" class="add_btn" data-toggle="modal" onclick="addemp()" data-target="#myModal">Add Boat</button>
            	</div>
	            	
						<?php            		
							while($data=mysqli_fetch_assoc($execute_query))
								{	
									?>
									<div class="wrapper boat_content">
										<div id="boat_listing_logo">
											<img src="<?php echo $data['boatlogourl']?>">
										</div>
										<div id="boat_desc">
											<div class="row">
												<div class="col"><label><b>Boat Name :</b></label> <?php echo $data['boatname']?></div>
											</div>
											<div class="row">
												<div class="col"><label><b>Boat Model :</b></label> <?php echo $data['modelname']?></div>
											</div>
											<div class="row">
												<div class="col"><label><b>Boat Number :</b></label> <?php echo $data['boatnumber']?></div>
											</div>
											<div class="row">
												<div class="col"><label><b>Boat Capacity</b>(In KG)<b> :</b></label> <?php echo $data['weightcapacity']?></div>
											</div>
											<div class="row">
												<div class="col"><label><b>Seats Available :</b></label> <?php echo $data['personcapacity']?></div>
											</div>
											<button class="custombutton" type="button" onclick="editemp(<?= $data['boatid'] ?>)" data-toggle="modal" data-target="#myModal">Edit</button>
											<a class="delete_btn" href="../../scripts/bo/boat_delete_script.php?id=<?=$data['boatid']?>">Delete</a>
										</div>
									</div>
									<?php
								}
						?>
        </div>
    </div>
</div>


<!--------------------------------Modal------------------------------->

<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content bo_form" id="form_modal" style="width: 668px !important;">
    </div>
      <!-- Modal content end-->

  </div>
</div>
<script>
	 function addemp()
	{
		// debugger;
		 $.ajax({
		type:"POST",
		url:"boat_register.php",
		success:function(boat_add)
		{
		   $("#form_modal").html(boat_add);
		}
		})

	}

		 function editemp(id)
	{
		// debugger;
		 $.ajax({
		type:"POST",
		url:"boat_edit.php",
		data:"id="+id,
		success:function(boat_edit)
		{
		   $("#form_modal").html(boat_edit);
		}

		 })

	}
	// function viewrecord(id)
	// {
	// 	// alert(id);
	// 	$.ajax({
	// 	type:"POST",
	// 	url:"pending_boat_request.php",
	// 	data:"id="+id,
	// 	success:function(pending_request)
	// 	{
	// 	   $("#result").html(pending_request);
	// 	}

	// 	 })
	// }

</script>
<script>
    $(document).ready(function() {
    $('#boatlist').DataTable();
} );
</script>
