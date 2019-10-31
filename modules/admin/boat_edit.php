 <?php
require"../../includes/admin/dbconnect.php";
$user_id=$_POST['id'];
$edit_query="SELECT * FROM boatdetails WHERE boatid=".$user_id;
$execute_query=mysqli_query($connect,$edit_query);
$edit_data=mysqli_fetch_assoc($execute_query);
$boatowner_name="SELECT id,username FROM boatowner";
$select_port_query="SELECT portid,portname FROM ports";
$execute_select_port_query=mysqli_query($connect,$select_port_query);
$execute_boatowner_name=mysqli_query($connect,$boatowner_name);
$getboatowner_query="SELECT id,username FROM boatowner WHERE status=1";
$execute_getboatowner_query=mysqli_query($connect,$getboatowner_query);

// $getcounrty_query="SELECT * FROM country";
// $execute_getcounrty_query=mysqli_query($connect,$getcounrty_query);
 ?>


 <!-- Modal content-->
	<form action="../../scripts/admin/boat_edit_script.php" method="post">
    <input type="text" name="boatid" value="<?= $edit_data['boatid']?>" readonly style="display:none;">
    <input type="text" name="boid" value="<?= $edit_data['boatowner']?>" readonly style="display:none;">
      <div class="modal-header">
        <h4 class="modal-title">Add Employee</h4>
      </div>
      <div class="modal-body">
      <div class="row">
      		<div class="col-4"><label>Boat Owner</label>
            <!-- <input type="text" name="boname" value="
            <?php
           // while($boat_owner_data=mysqli_fetch_array($execute_boatowner_name))
           // {
           //  if($edit_data['boatowner']==$boat_owner_data['id'])
           //  {
           //    echo $boat_owner_data['username'];
           //  }
           // }
           ?>"> -->
              <select name="boname">
              <option>Select BoatOwner</option>
              <?php 
                while($result=mysqli_fetch_assoc($execute_getboatowner_query))
                {
                  echo "<option value='".$result['id']."'";if($result['id']==$edit_data['boatowner']){echo "selected";} echo">".$result['username']."</option>";
                }
              ?>
            </select>
         </div>
      		<div class="col-4"><label>Boat Name</label><input type="text" name="boatname" value="<?= $edit_data['boatname']?>"></div>
          <div class="col-4"><label>Boat Number</label><input type="text" name="boatnumber" value="<?= $edit_data['boatnumber']?>"></div>
      	</div>
      	<div class="row">
          <div class="col-4"><label>Person Capacity</label><input type="text" name="personcapacity" value="<?= $edit_data['personcapacity']?>"></div>
          <div class="col-4"><label>Weight capacity</label><input type="text" name="weightcapacity" value="<?= $edit_data['weightcapacity']?>"></div>
      		<!-- <div class="col-4"><label>mobile number</label>     <input type="text" name="mobile_number"></div> -->
      	</div>
      	<div class="row">
          <div class="col-4"><label>Brand Name</label><input type="text" name="brandname" value="<?= $edit_data['brandname']?>"></div>
          <div class="col-4"><label>Model Name</label><input type="text" name="modelname" value="<?= $edit_data['modelname']?>"></div>
          <!-- <div class="col-4"><label></label>Gender: Male       <input type="radio" name="gender" value="1">Female  <input type="radio" name="gender" value="2">other                                                         <input type="radio" name="gender" value="3"></div> -->
      	</div>
         <div class="row">
          <div class="col"><label>Day</label></div>
          <div class="col"><label>Departure time</label></div>
          <div class="col"><label>Arrival Time</label></div>
        </div>
        <div class="row">
          <div class="col-4"><label>Sunday</label></div>
          <div class="col-4"><select name="time[1][]" class="time_select"><option value="">Closed</option></select></div>
          <div class="col-4"><select name="time[1][]" class="time_select"><option value="">Closed</option></select></div>
        </div>
        <div class="row">
          <div class="col-4"><label>Monday</label></div>
          <div class="col-4"><select name="time[2][]"class="time_select"><option value="">Closed</option></select></div>
          <div class="col-4"><select name="time[2][]" class="time_select"><option value="">Closed</option></select></div>
        </div>
        <div class="row">
          <div class="col-4"><label>Tuesday</label></div>
          <div class="col-4"><select name="time[3][]" class="time_select"><option value="">Closed</option></select></div>
          <div class="col-4"><select name="time[3][]" class="time_select"><option value="">Closed</option></select></div>
        </div>
        <div class="row">
          <div class="col-4"><label>Wednesday</label></div>
          <div class="col-4"><select name="time[4][]" class="time_select"><option value="">Closed</option></select></div>
          <div class="col-4"><select name="time[4][]" class="time_select"><option value="">Closed</option></select></div>
        </div>
        <div class="row">
          <div class="col-4"><label>Thursday</label></div>
          <div class="col-4"><select name="time[5][]" class="time_select"><option value="">Closed</option></select></div>
          <div class="col-4"><select name="time[5][]" class="time_select"><option value="">Closed</option></select></div>
        </div>
        <div class="row">
          <div class="col-4"><label>Friday</label></div>
          <div class="col-4"><select name="time[6][]" class="time_select"><option value="">Closed</option></select></div>
          <div class="col-4"><select name="time[6][]"class="time_select"><option value="">Closed</option></select></div>
        </div>
        <div class="row">
          <div class="col-4"><label>Saturday</label></div>
          <div class="col-4"><select name="time[7][]" class="time_select"><option value="">Closed</option></select></div>
          <div class="col-4"><select name="time[7][]" class="time_select"><option value="">Closed</option></select></div>
        </div>
        <div class="row">
              <div class="col-4">
                <label><b>Select Ports</b></label>
              </div>
              <div class="col-8">
                <?php 
                  while($data=mysqli_fetch_assoc($execute_select_port_query))
                  {
                    echo "<input type='checkbox' name='port[]' value='".$data['portid']."'>".$data['portname'];
                  }
                ?>
              </div>
        </div>
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

            $(document).ready(function(){
            // var a ="<option value='00:00'>00:00 AM</option><option value='00:30'>00:30 AM</option><option value='01:00'>01:00 AM</option>";
            // $(".time_select").html(a);
            var c=3;
            for(b=1;b<25;b++)
            {
                 $(".time_select").append("<option value='"+b+":00'>"+b+":00</option><option value='"+b+":"+c+"0'>"+b+":"+c+"0</option>");
            }
        });
        </script>