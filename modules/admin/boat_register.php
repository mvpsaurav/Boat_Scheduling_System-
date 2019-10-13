 <?php
 require"../../includes/admin/dbconnect.php";
 $getcounrty_query="SELECT * FROM country";
 $execute_getcounrty_query=mysqli_query($connect,$getcounrty_query);
 ?>
 
 <!-- Modal content-->
	<form action="../../scripts/admin/bo_register_script.php" method="post">
      <div class="modal-header">
        <h4 class="modal-title">Add Boat Owner</h4>
      </div>
      <div class="modal-body">
      	<div class="row">
      		<div class="col-4">user name:<input type="text" name="user_name"></div>
      		<div class="col-4">full name:<input type="text" name="full_name"></div>
          <div class="col-4">user email:<input type="text" name="user_email"></div>
      	</div>
      	<div class="row">
          <div class="col-4">user password:<input type="password" name="password"></div>
          <div class="col-4">confirm password:<input type="password" name="confirm_password"></div>
      		<div class="col-4">mobile number:<input type="text" name="mobile_number"></div>
      	</div>
      	<div class="row">
          <div class="col-4">Aadhaar Number:<input type="text" name="aadaarnumber"></div>
          <div class="col-4">PAN Number:<input type="text" name="pannumber"></div>
          <div class="col-4">Gender: Male<input type="radio" name="gender" value="1">Female<input type="radio" name="gender" value="2">other<input type="radio" name="gender" value="3"></div>
      	</div>
        <div class="row">
          <div class="col-4">Bank Name:<input type="text" name="bank_name"></div>
          <div class="col-4">Account Number:<input type="text" name="account_number"></div>
          <div class="col-4">Account Name:<input type="text" name="account_name"></div>
        </div>
        <div class="row">
          <div class="col-4">IFSC Code:<input type="text" name="ifsc"></div>
     <!-- <div class="col-4">confirm password:<input type="text" name="confirm_password"></div>
          <div class="col-4">user password:<input type="text" name="password"></div> -->
        </div>
        <div class="row">
          <div class="col-4">Address Line 1:<input type="text" name="address1"></div>
          <div class="col-4">Address Line 2(Optional):<input type="text" name="address2"></div>
          <div class="col-4">Zip Code:<input type="text" name="zip_code"></div>
        </div>
        <div class="row">
          <div class="col-4">Country:
            <select name="country" onchange="getstate(this.value)">
              <option>Select Country</option>
              <?php
                while($result=mysqli_fetch_assoc($execute_getcounrty_query))
                {
                echo "<option value='".$result["id"]."'>".$result["countryname"]."</option>";
                }
              ?>
            </select>
          </div>  
          <div class="col-4">State:
                <select id="state" name="state" onchange="getcity(this.value)">
                  <option>Select State</option>
              </select>

          </div>
          <div class="col-4">City:
          <select id="city" name="city">
                  <option>Select City</option>
              </select>
          </div>
        </div>
       
      </div>
      <div class="modal-footer">
      	<button type="submit" class="btn btn-success">Add</button>
        <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
      </div>
    </form>
      <!-- Modal content end-->
      <script>
        function getstate(id)
        {
        $.ajax({
        type:"POST",
        url:"getstate.php",
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
        url:"getcity.php",
        data:"state_id="+id,
        success:function(city)
        {
          $("#city").html(city);
          // alert(city);
        }
        })
        }

        </script>