 <?php
 require"../../includes/admin/dbconnect.php";
 $getcounrty_query="SELECT * FROM country";
 $getboatowner_query="SELECT id,username FROM boatowner WHERE status=1";
 $execute_getcounrty_query=mysqli_query($connect,$getcounrty_query);
 $execute_getboatowner_query=mysqli_query($connect,$getboatowner_query);

 ?>
 
 <!-- Modal content-->
	<form action="../../scripts/admin/boat_register_script.php" method="post">
      <div class="modal-header">
        <h4 class="modal-title">Add Boat</h4>
      </div>
      <div class="modal-body">
      	<div class="row">
          <div class="col-4"><label>Boat Owner</label>
            <select name="bo_id">
              <option>Select BoatOwner</option>
              <?php 
                while($result=mysqli_fetch_assoc($execute_getboatowner_query))
                {
                  echo "<option value='".$result['id']."'>".$result['username']."</option>";
                }
              ?>
            </select>
          </div>
      		<div class="col-4"><label>Boat Name</label><input type="text" name="boatname"></div>
          <div class="col-4"><label>Boat Number</label><input type="text" name="boatnumber"></div>
      	</div>
      	<div class="row">
          <div class="col-4"><label>Person Capacity</label><input type="text" name="personcapacity"></div>
          <div class="col-4"><label>Weight capacity(In KG)</label><input type="text" name="weightcapacity"></div>
      		<!-- <div class="col-4"><label>mobile number</label>     <input type="text" name="mobile_number"></div> -->
      	</div>
      	<div class="row">
          <div class="col-4"><label>Brand Name</label><input type="text" name="brandname"></div>
          <div class="col-4"><label>Model Name</label><input type="text" name="modelname"></div>
          <!-- <div class="col-4"><label></label>Gender: Male       <input type="radio" name="gender" value="1">Female  <input type="radio" name="gender" value="2">other                                                         <input type="radio" name="gender" value="3"></div> -->
      	</div>
        <!-- <div class="row">
          <div class="col-4"><label></label>Bank Name:             <input type="text" name="bank_name"></div>
          <div class="col-4"><label></label>Account Number:             <input type="text" name="account_number"></div>
          <div class="col-4"><label></label>Account Name:             <input type="text" name="account_name"></div>
        </div> -->
        <!-- <div class="row">
          <div class="col-4">IFSC Code:                             <input type="text" name="ifsc"></div>
     <div class="col-4">confirm password:                             <input type="text" name="confirm_password"></div>
          <div class="col-4">user password:                             <input type="text" name="password"></div> -->
        <!-- </div> -->
        <!-- <div class="row">
          <div class="col-4">Address Line 1:                             <input type="text" name="address1"></div>
          <div class="col-4">Address Line 2(Optional):                             <input type="text" name="address2"></div>
          <div class="col-4">Zip Code:                             <input type="text" name="zip_code"></div>
        </div>
        <div class="row">
          <div class="col-4">Country:
            <select name="country" onchange="getstate(this.value)">
              <option>Select Country</option>
              <?php
                // while($result=mysqli_fetch_assoc($execute_getcounrty_query))
                // {
                // echo "<option value='".$result["id"]."'>".$result["countryname"]."</option>";
                // }
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
        </div> -->
       
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