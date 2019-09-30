 <!-- Modal content-->
	<form action="../../scripts/admin/employee_register_script.php" method="post">
      <div class="modal-header">
        <h4 class="modal-title">Add Employee</h4>
      </div>
      <div class="modal-body">
      	<div class="row">
      		<div class="col-6">user name:<input type="text" name="user_name"></div>
      		<div class="col-6">full name:<input type="text" name="full_name"></div>
      	</div>
      	<div class="row">
      		<div class="col-6">user email:<input type="text" name="user_email"></div>
      		<div class="col-6">mobile number:<input type="text" name="mobile_number"></div>
      	</div>
      	<div class="row">
      		<div class="col-6">user password:<input type="password" name="password"></div>
      		<div class="col-6">confirm password:<input type="password" name="confirm_password"></div>
      	</div>
      </div>
      <div class="modal-footer">
      	<button type="submit" class="btn btn-success">Add</button>
        <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
      </div>
    </form>
      <!-- Modal content end-->