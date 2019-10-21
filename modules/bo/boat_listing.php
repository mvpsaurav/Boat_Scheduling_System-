<?php
require"../../includes/bo/layout/head.php";
require"../../includes/bo/layout/condition_check.php";
require"../../includes/bo/layout/sidebar.php";
// require"../../includes/admin/layout/header.php";
require"../../includes/admin/dbconnect.php";

$pending_query="SELECT * FROM boatdetails WHERE status = 3";
$listing_query="SELECT * FROM boatdetails WHERE status = 1";
$execute_query=mysqli_query($connect,$listing_query);
$execute_pending_query=mysqli_query($connect,$pending_query);
$check_rows_pending_query=mysqli_num_rows($execute_pending_query);
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
					<button type="button" class="btn btn-dark" data-toggle="modal" onclick="addemp()" data-target="#myModal">Add Boat</button>
            	</div>
            	<div class="wrapper">
	            	<table id="boatlist" class="customtable table table-striped table-bordered">
	            		<thead class="thead-dark">
	            		<tr>
		        			<th scope="col">#</th>
		            		<th scope="col">Boat Name</th>
		            		<th scope="col">Boat Model</th>
		            		<th scope="col">Boat Owner</th>
		            		<th scope="col">Edit/Delete</th>
		            	</tr>
		            </thead>
		            <tbody>
	<?php            		
		while($data=mysqli_fetch_assoc($execute_query))
			{	
				echo '<tr>';
				echo '<td scope="row">'.$index.'</td>';
				echo '<td>'.$data['boatname'].'</td>';
				echo '<td>'.$data['modelname'].'</td>';
				echo '<td>'.$data['boatowner'].'</td>';
				echo '<td><a href="#" onclick="editemp('.$data['boatid'].')" data-toggle="modal" data-target="#myModal" class="btn btn-primary">Edit</a> <a href="../../scripts/admin/boat_delete_script.php?id='.$data['boatid'].'" class="btn btn-danger">Delete</a></td>';
				echo '</tr>';
				$index++;
			}
	?>
	         		</tbody>   
	         		<tfoot class="thead-dark">
	            		<tr>
		        		<th scope="col">#</th>
		            		<th scope="col">Boat Name</th>
		            		<th scope="col">Boat Model</th>
		            		<th scope="col">Boat Owner</th>
		            		<th scope="col">Edit/Delete</th>
		            	</tr>
		            </tfoot>
	         	</table>		
	         </div>
        </div>
    </div>
    <div class="wrapper col-4" style="float:left">
				<?php
				if($check_rows_pending_query > 0)
				{
					echo "<label>Pending Request </label>";
					while($result=mysqli_fetch_assoc($execute_pending_query))
					{
						echo "<br><div class='pendingbo'><button type='submit'  class='btn btn-xs btn-primary' style='padding: 0px 4px !important;'  onclick='viewrecord(".$result["boatid"].")'>View Record</button> <label>Boat Id:</label> ".$result["boatid"].", <label>Boat Name:</label> ".$result["boatname"].", <label>Reuqested At:</label> ".$result["createdat"]."</div>";
					}
				}
				?>
			</div>
			<div class="wrapper col-7" id="result" style="float:right"></div>

</div>


<!--------------------------------Modal------------------------------->

<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content bo_form" id="form_modal" style="
    width: 668px !important;">
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
		success:function(emp_add)
		{
		   $("#form_modal").html(emp_add);
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
		success:function(emp_edit)
		{
		   $("#form_modal").html(emp_edit);
		}

		 })

	}
	function viewrecord(id)
	{
		// alert(id);
		$.ajax({
		type:"POST",
		url:"pending_boat_request.php",
		data:"id="+id,
		success:function(pending_request)
		{
		   $("#result").html(pending_request);
		}

		 })
	}

</script>
<script>
    $(document).ready(function() {
    $('#boatlist').DataTable();
} );
</script>
