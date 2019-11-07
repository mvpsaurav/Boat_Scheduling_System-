 <?php
include "../../includes/admin/dbconnect.php";
$user_id=$_POST['id'];
$edit_query="SELECT * FROM users WHERE userid=".$user_id;
$execute_query=mysqli_query($connect,$edit_query);
$edit_data=mysqli_fetch_assoc($execute_query);
 ?>


 <!-- Modal content-->
	<form action="../../scripts/admin/employee_edit_script.php" method="post">
    <input type="text" name="userid" value="<?= $edit_data['userid']?>" readonly style="display:none;">
      <div class="modal-header">
        <h4 class="modal-title">Edit Employee</h4>
      </div>
      <div class="modal-body">
      	<div class="row">
      		<div class="col-6">user name:<input type="text" required value="<?= $edit_data['username']?>" name="user_name"></div>
      		<div class="col-6">full name:<input type="text" required value="<?= $edit_data['name']?>" name="full_name"></div>
      	</div>
      	<div class="row">
      		<div class="col-6">user email:<input type="text"  value="<?= $edit_data['email']?>" name="user_email"></div>
      		<div class="col-6">mobile number:<input type="text" required value="<?= $edit_data['mobilenumber']?>" name="mobile_number" pattern="[0-9]{10}"></div>
      	</div>
      	<div class="row">
      		<div class="col-6">user password:<input type="password" required name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"></div>
      		<div class="col-6">confirm password:<input type="password" required name="confirm_password"></div>
      	</div>
      </div>
      <div class="modal-footer">
      	<button type="submit" class="add_btn">Update</button>
        <button type="button" class="add_btn" data-dismiss="modal">Close</button>
      </div>
    </form>
      <!-- Modal content end-->