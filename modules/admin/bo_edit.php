 <?php
require"../../includes/admin/dbconnect.php";
$user_id=$_POST['id'];
$edit_query="SELECT * FROM boatowner WHERE id=".$user_id;
$execute_query=mysqli_query($connect,$edit_query);
$edit_data=mysqli_fetch_assoc($execute_query);
$getcounrty_query="SELECT * FROM country";
$execute_getcounrty_query=mysqli_query($connect,$getcounrty_query);
 ?>


 <!-- Modal content-->
	<form action="../../scripts/admin/bo_edit_script.php" method="post">
    <input type="text" name="userid" value="<?= $edit_data['id']?>" readonly style="display:none;">
      <div class="modal-header">
        <h4 class="modal-title">Edit Boat Owner</h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-4"><label>User Name</label><input type="text" name="user_name" required value="<?= $edit_data['username']?>"></div>
          <div class="col-4"><label>Full Name</label><input type="text" name="full_name" required value="<?= $edit_data['name']?>"></div>
          <div class="col-4"><label>Email</label><input type="text" name="user_email" value="<?= $edit_data['email']?>"></div>
        </div>
        <div class="row">
          <div class="col-4"><label>Password</label> <input type="password" name="password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"></div>
          <div class="col-4"><label>Confirm Password</label><input type="password" name="confirm_password" required></div>
          <div class="col-4"><label>Mobile Number</label><input type="text" name="mobile_number" pattern="[0-9]{10}" value="<?= $edit_data['mobilenumber']?>"></div>
        </div>
        <div class="row">
          <div class="col-4"><label>Aadhaar Number</label><input type="text" name="aadaarnumber" value="<?= $edit_data['adhaarnumber']?>"></div>
          <div class="col-4"><label>PAN Number</label><input type="text" name="pannumber" value="<?= $edit_data['pannumber']?>"></div>
          <div class="col-4"><label>Gender</label><div class="radio-group"><label class="radio"><input type="radio" name="gender" value="1" <?= $edit_data['gender']== 1 ? "checked" : "" ;?> >Male<span></span></label><label class="radio"><input type="radio" name="gender" value="2" <?= $edit_data['gender']== 2 ? "checked" : "" ;?>> Female<span></span></label><label class="radio"><input type="radio" name="gender" value="3" <?= $edit_data['gender']== 3 ? "checked" : "" ;?>>Other<span></span></label></div></div>
        </div>
        <div class="row">
          <div class="col-4"><label>Bank Name</label><input type="text" name="bank_name" value="<?= $edit_data['bankname']?>"></div>
          <div class="col-4"><label>Account Number</label><input type="text" name="account_number" value="<?= $edit_data['accountnumber']?>"></div>
          <div class="col-4"><label>Account Name</label><input type="text" name="account_name" value="<?= $edit_data['accountname']?>"></div>
        </div>
        <div class="row">
          <div class="col-4"><label>IFSC Code</label><input type="text" name="ifsc" value="<?= $edit_data['ifsc']?>"></div>
          </div>
        <div class="row">
          <div class="col-4"><label>Address Line 1</label><input type="text" name="address1" value="<?= $edit_data['addressline1']?>"></div>
          <div class="col-4"><label>Address Line 2(Optional)</label><input type="text" name="address2" value="<?= $edit_data['addressline2']?>"></div>
          <div class="col-4"><label>Zip Code</label><input type="text" name="zip_code" value="<?= $edit_data['zipcode']?>"></div>
        </div>
        <div class="row">
        <div class="col-4"><label>Country</label><br>
            <select name="country" onchange="getstate(this.value)">
              <option>Select Country</option>
              <?php
                while($result=mysqli_fetch_assoc($execute_getcounrty_query))
                {
                echo "<option value='".$result["id"]."'";if($result["id"]==$edit_data['countryid']){echo"selected";}echo">".$result["countryname"]."</option>";
                }
              ?>
            </select>
          </div>  
          <div class="col-4"><label>State</label><br>
                <select id="state" name="state" onchange="getcity(this.value)">
                  <option>Select State</option>
                  <?php
                    $getstate_query="SELECT * FROM state WHERE countryid=".$edit_data['countryid'];
                    $execute_getstate_query=mysqli_query($connect,$getstate_query);
                    while($result=mysqli_fetch_assoc($execute_getstate_query))
                    {
                    echo "<option value='".$result["stateid"]."'";if($result["stateid"]==$edit_data['stateid']){echo"selected";}echo">".$result["statename"]."</option>";
                    }
                  ?>
              </select>

          </div>
          <div class="col-4"><label>City</label><br>
          <select id="city" name="city">
                  <option>Select City</option>
                  <?php
                    $getcity_query="SELECT * FROM city WHERE stateid=".$edit_data['stateid'];
                    $execute_getcity_query=mysqli_query($connect,$getcity_query);
                    while($result=mysqli_fetch_assoc($execute_getcity_query))
                    {
                    echo "<option value='".$result["cityid"]."'";if($result["cityid"]==$edit_data['cityid']){echo"selected";}echo">".$result["cityname"]."</option>";
                    }
                  ?>
              </select>
          </div>
        </div>
      
      </div>
      <div class="modal-footer">
      	<button type="submit" class="add_btn">Update</button>
        <button type="button" class="add_btn" data-dismiss="modal">Close</button>
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