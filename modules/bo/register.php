<?php include"../../includes/bo/layout/head.php";
// echo$roleid= $_SESSION['userrole'];
if(!empty($_SESSION['userrole']))
{   
	$roleid= $_SESSION['userrole'];
    if($roleid==3)
	{
	    header("location: boat_listing.php");
	}
}
require"../../includes/admin/dbconnect.php";
 $getcounrty_query="SELECT * FROM country";
 $execute_getcounrty_query=mysqli_query($connect,$getcounrty_query);
?>

<div class="login_form_body">
	<div class="login_form_wrapper">
		<div id="bo_login_header">
		Boat Owner Login
		</div>
<!-------- Code starts from here------------->
<!-- <form action="../../scripts/bo/login_script.php" method="post">
<label>User Name</label><input type="text" name="user_name">
<label>Password</label><input type="password" name="password">
<button type="submit">Login</button>
</form>
</div>
</div> -->



<form action="../../scripts/bo/bo_register_script.php" method="post">
<div class="bo_register_from">
      	<div class="row">
      		<div class="col"><label>User Name</label><input type="text" required name="user_name"></div>
		  </div>
		<div class="row">
			  <div class="col"><label>Full Name</label><input type="text" required name="full_name"></div>
		</div>
		<div class="row">	
          	<div class="col"><label>Email</label><input type="text" name="user_email"></div>
      	</div>
      	<div class="row">
		  <div class="col"><label>Password</label><input type="password" name="password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"></div>
		</div>
		<div class="row">
		  <div class="col"><label>Confirm Password</label><input type="password" required name="confirm_password"></div>
		</div>
		<div class="row">
			<div class="col"><label>Mobile Number</label><input type="text" name="mobile_number"></div>
		</div>
      	<div class="row">
		  <div class="col"><label>Aadhaar Number</label><input type="text" name="aadaarnumber"></div>
		</div>
      	<div class="row">
		  <div class="col"><label>PAN Number</label><input type="text" name="pannumber"></div>
		</div>
		<div class="row">
          <div class="col"><label>Gender</label><div class="radio-group"><label class="radio"><input type="radio" name="gender" value="1">Male<span></span></label><label class="radio"><input type="radio" name="gender" value="2">Female<span></span></label><label class="radio"><input type="radio" name="gender" value="3">Other<span></span></label></div></div>
      	</div>
        <div class="row">
		  <div class="col"><label>Bank Name</label><input type="text" name="bank_name"></div>
		</div>
		<div class="row">
		  <div class="col"><label>Account Number</label><input type="text" name="account_number"></div>
		</div>
		<div class="row">
          <div class="col"><label>Account Name</label><input type="text" name="account_name"></div>
        </div>
        <div class="row">
          <div class="col"><label>IFSC Code</label><input type="text" name="ifsc"></div>
     <!-- <div class="col">confirm password:<input type="text" name="confirm_password"></div>
          <div class="col">user password:<input type="text" name="password"></div> -->
        </div>
        <div class="row">
		  <div class="col"><label>Address Line 1</label><input type="text" name="address1"></div>
        </div>
		<div class="row">
		  <div class="col"><label>Address Line 2(Optional)</label><input type="text" name="address2"></div>
		</div>
		<div class="row">
          <div class="col"><label>Zip Code</label><input type="text" name="zip_code"></div>
        </div>
        <div class="row">
          <div class="col"><label>Country</label><br>
            <select name="country" onchange="getstate(this.value)">
              <option value="">Select Country</option>
              <?php
                while($result=mysqli_fetch_assoc($execute_getcounrty_query))
                {
                echo "<option value='".$result["id"]."'>".$result["countryname"]."</option>";
                }
              ?>
            </select>
		  </div>  
          <div class="col"><label>State</label><br>
                <select id="state" name="state" onchange="getcity(this.value)">
                  <option value="">Select State</option>
              </select>

		  </div>
          <div class="col"><label>City</label><br>
          <select id="city" name="city">
                  <option value="">Select City</option>
              </select>
          </div>
		</div>
		</div>
		Have an Account? <a href="login.php">Login now</a>
      	<button type="submit">Register</button>
	</form>
	</div>
</div>







<script>
        function getstate(id)
        {
        $.ajax({
        type:"POST",
        url:"../admin/getstate.php",
        data:"country_id="+id,
        success:function(state)
        {
          $("#state").html(state);
          // alert(state);
        }
        })
        }

        function getcity(id)
        {
        $.ajax({
        type:"POST",
        url:"../admin/getcity.php",
        data:"state_id="+id,
        success:function(city)
        {
          $("#city").html(city);
          // alert(city);
        }
        })
        }

        </script>

<!------------- Code ends here------------->
<?php include"../../includes/bo/layout/footer.php";?>