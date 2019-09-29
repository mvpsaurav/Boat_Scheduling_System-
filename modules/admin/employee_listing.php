<?php
require"../../includes/admin/layout/head.php";
require"../../includes/admin/layout/sidebar.php";
require"../../includes/admin/layout/header.php";
require"../../includes/admin/dbconnect.php";

$listing_query="SELECT * FROM users WHERE roleid <= 2";
$execute_query=mysqli_query($connect,$listing_query);
$index=1;
?>
<div class="container">
    <div class="row">
            <div class="col">
            	<div>
					<a href="employee_register.php" class="btn btn-dark">Add Employee</a>
					<button type="button" class="btn btn-dark" data-toggle="modal" data-target="#myModal">Add Employee</button>
            	</div>
            	<table class="table table-striped table-bordered">
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
			echo '<td><a href="#" class="btn btn-primary">Edit</a> <a href="#" class="btn btn-danger">Delete</a></td>';
			echo '</tr>';
			$index++;
		}
?>
         </tbody>   		
        </div>
    </div>
</div>











<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
		<form action="../../scripts/admin/employee_register_script.php" method="post">
		user name:<input type="text" name="user_name">
		<br>full name:<input type="text" name="full_name">
		<br>user email:<input type="text" name="user_email">
		<br>mobile number:<input type="text" name="mobile_number">
		<br>user password:<input type="password" name="password">
		<br>confirm password:<input type="password" name="confirm_password">
		<br><button type="submit">Register</button>
		</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
