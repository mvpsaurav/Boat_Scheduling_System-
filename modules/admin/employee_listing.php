<?php
require"../../includes/admin/layout/head.php";
require"../../includes/admin/layout/condition_check.php";
require"../../includes/admin/layout/sidebar.php";
// require"../../includes/admin/layout/header.php";
require"../../includes/admin/dbconnect.php";

$listing_query="SELECT * FROM users WHERE roleid = 2 && status = 1";
$execute_query=mysqli_query($connect,$listing_query);
$index=1;
?>
<div class="col-10 header_container">
<h1 class=header_name>Employee</h1>
</div>
<div class="container">
    <div class="row">
            <div class="col">
            	<div class="add_button">
					<!-- <a href="employee_register.php" class="btn btn-dark">Add Employee</a> -->
					<button type="button" class="btn btn-dark" data-toggle="modal" onclick="addemp()" data-target="#myModal">Add Employee</button>
            	</div>
            	<div class="wrapper">
	            	<table class="table customtable table-striped table-bordered" id="emplist">
	            		<thead class="thead-dark">
	            		<tr>
		        			<th scope="col">#</th>
		            		<th scope="col">Employee Name</th>
		            		<th scope="col">Employee Email</th>
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
				echo '<td><a href="#" onclick="editemp('.$data['userid'].')" data-toggle="modal" data-target="#myModal" class="btn btn-primary">Edit</a> <a href="../../scripts/admin/employee_delete_script.php?id='.$data['userid'].'" class="btn btn-danger">Delete</a></td>';
				echo '</tr>';
				$index++;
			}
	?>
		         		</tbody>
			       		<tfoot class="thead-dark">
	           				<th scope="col">#</th>
			            		<th scope="col">Employee Name</th>
			            		<th scope="col">Employee Email</th>
			            		<th scope="col">Mobile Number</th>
			            		<th scope="col">Edit/Delete</th>
	        			</tfoot>  
	     			</table>
     			</div> 	
        	</div>
    </div>
</div>


<!--------------------------------Modal------------------------------->

<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog" role="document">

    <!-- Modal content-->
    <div class="modal-content" id="form_modal">
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
		url:"employee_register.php",
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
		url:"employee_edit.php",
		data:"id="+id,
		success:function(emp_edit)
		{
		   $("#form_modal").html(emp_edit);
		}

		 })

	}

</script>
<script>
    $(document).ready(function() {
    $('#emplist').DataTable();
} );
</script>