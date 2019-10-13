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
        <h4 class="modal-title">Add Employee</h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-4">user name:<input type="text" name="user_name" value="<?= $edit_data['username']?>"></div>
          <div class="col-4">full name:<input type="text" name="full_name" value="<?= $edit_data['name']?>"></div>
          <div class="col-4">user email:<input type="text" name="user_email" value="<?= $edit_data['email']?>"></div>
        </div>
        <div class="row">
          <div class="col-4">user password:<input type="password" name="password"></div>
          <div class="col-4">confirm password:<input type="password" name="confirm_password"></div>
          <div class="col-4">mobile number:<input type="text" name="mobile_number" value="<?= $edit_data['mobilenumber']?>"></div>
        </div>
        <div class="row">
          <div class="col-4">Aadhaar Number:<input type="text" name="aadaarnumber" value="<?= $edit_data['adhaarnumber']?>"></div>
          <div class="col-4">PAN Number:<input type="text" name="pannumber" value="<?= $edit_data['pannumber']?>"></div>
          <div class="col-4">Gender: Male<input type="radio" name="gender" value="1" <?= $edit_data['gender']== 1 ? "checked" : "" ;?> >Female<input type="radio" name="gender" value="2" <?= $edit_data['gender']== 2 ? "checked" : "" ;?>>other<input type="radio" name="gender" value="3" <?= $edit_data['gender']== 3 ? "checked" : "" ;?>></div>
        </div>
        <div class="row">
          <div class="col-4">Bank Name:<input type="text" name="bank_name" value="<?= $edit_data['bankname']?>"></div>
          <div class="col-4">Account Number:<input type="text" name="account_number" value="<?= $edit_data['accountnumber']?>"></div>
          <div class="col-4">Account Name:<input type="text" name="account_name" value="<?= $edit_data['accountname']?>"></div>
        </div>
        <div class="row">
          <div class="col-4">IFSC Code:<input type="text" name="ifsc" value="<?= $edit_data['ifsc']?>"></div>
          </div>
        <div class="row">
          <div class="col-4">Address Line 1:<input type="text" name="address1" value="<?= $edit_data['addressline1']?>"></div>
          <div class="col-4">Address Line 2(Optional):<input type="text" name="address2" value="<?= $edit_data['addressline2']?>"></div>
          <div class="col-4">Zip Code:<input type="text" name="zip_code" value="<?= $edit_data['zipcode']?>"></div>
        </div>
        <div class="row">
        <div class="col-4">Country:
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
          <div class="col-4">State:
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
          <div class="col-4">City:
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
      	<button type="submit" class="btn btn-success">Update</button>
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