<?php
require"../../includes/admin/layout/head.php";
require"../../includes/admin/layout/condition_check.php";
require"../../includes/admin/layout/sidebar.php";
// require"../../includes/admin/layout/header.php";
require"../../includes/admin/dbconnect.php";

$listing_query="SELECT * FROM boatowner WHERE status = 1";
$pending_query="SELECT * FROM boatowner WHERE status = 3";
$execute_query=mysqli_query($connect,$listing_query);
$execute_pending_query=mysqli_query($connect,$pending_query);
$check_rows_pending_query=mysqli_num_rows($execute_pending_query);
$index=1;
?>
<div class="col-10 header_container">
<h1 class=header_name>Boat Owner</h1>
</div>
<div class="container">
    <div class="row">
            <div class="col">
            	<div class="add_button">
					<!-- <a href="employee_register.php" class="btn btn-dark">Add Employee</a> -->
					<button type="button" class="btn btn-dark" data-toggle="modal" onclick="addemp()" data-target="#myModal">Add Boat Owner</button>
            	</div>
            	<div class="wrapper">
	            	<table id="bolist" class="table customtable table-striped table-bordered">
	            		<thead class="thead-dark">
	            		<tr>
		        			<th scope="col">#</th>
		            		<th scope="col">Boat Owner Name</th>
		            		<th scope="col">Boat Owner Email</th>
		            		<th scope="col">Mobile Number</th>
		            		<th scope="col">Edit/Delete</th>
		            	</tr>
		            </thead>
		            <tbody>
	<?php            		
		while($data=mysqli_fetch_assoc($execute_query))
			{	
				echo '<tr>';
				echo '<td scope="row">'.$index.'</td>';
				echo '<td>'.$data['name'].'</td>';
				echo '<td>'.$data['email'].'</td>';
				echo '<td>'.$data['mobilenumber'].'</td>';
				echo '<td><a href="#" onclick="editemp('.$data['id'].')" data-toggle="modal" data-target="#myModal" class="btn btn-primary">Edit</a> <a href="../../scripts/admin/bo_delete_script.php?id='.$data['id'].'" class="btn btn-danger">Delete</a></td>';
				echo '</tr>';
				$index++;
			}
	?>
	         		</tbody>   
	         		<tfoot class="thead-dark">
	            		<tr>
		        			<th scope="col">#</th>
		            		<th scope="col">Boat Owner Name</th>
		            		<th scope="col">Boat Owner Email</th>
		            		<th scope="col">Mobile Number</th>
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
						echo "<br><div class='pendingbo'><button type='submit'  class='btn btn-xs btn-primary' style='padding: 0px 4px !important;'  onclick='viewrecord(".$result["id"].")'>View Record</button> <label>User Id:</label> ".$result["id"].", <label>User Name:</label> ".$result["username"].", <label>Reuqested At:</label> ".$result["createdat"]."</div>";
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
		url:"bo_register.php",
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
		url:"bo_edit.php",
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
		url:"pending_bo_request.php",
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
    $('#bolist').DataTable();
} );
</script>
