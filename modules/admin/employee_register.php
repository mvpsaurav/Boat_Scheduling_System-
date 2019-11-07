 <!-- Modal content-->
	<form action="../../scripts/admin/employee_register_script.php" method="post">
      <div class="modal-header">
        <h4 class="modal-title">Add Employee</h4>
      </div>
      <div class="modal-body">
      	<div class="row">
      		<div class="col-6">user name:<input type="text" required name="user_name"></div>
      		<div class="col-6">full name:<input type="text" required name="full_name"></div>
      	</div>
      	<div class="row">
      		<div class="col-6">user email:<input type="text" name="user_email"></div>
      		<div class="col-6">mobile number:<input type="text" pattern="[0-9]{10}" name="mobile_number"></div>
      	</div>
      	<div class="row">
      		<div class="col-6">user password:<input type="password" name="password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"></div>
      		<div class="col-6">confirm password:<input type="password" name="confirm_password" required></div>
      	</div>
      </div>
      <div class="modal-footer">
      	<button type="submit" class="add_btn">Add</button>
        <button type="button" class="add_btn" data-dismiss="modal">Close</button>
      </div>
    </form>
      <!-- Modal content end-->