 <?php
 require"../../includes/admin/dbconnect.php";
 $getcounrty_query="SELECT * FROM country";
 $getboatowner_query="SELECT id,name FROM boatowner WHERE status=1";
 $select_port_query="SELECT portid,portname FROM ports";
 $execute_getcounrty_query=mysqli_query($connect,$getcounrty_query);
 $execute_select_port_query=mysqli_query($connect,$select_port_query);
 $execute_getboatowner_query=mysqli_query($connect,$getboatowner_query);

 ?>
 
 <!-- Modal content-->
	<form action="../../scripts/admin/boat_register_script.php" method="post" enctype="multipart/form-data">
      <div class="modal-header" onload="timeselecter()">
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
                  echo "<option value='".$result['id']."'>".$result['name']."</option>";
                }
              ?>
            </select>
          </div>
      		<div class="col-4"><label>Boat Name</label><input type="text" required name="boatname"></div>
          <div class="col-4"><label>Boat Number</label><input type="text" required name="boatnumber"></div>
      	</div>
      	<div class="row">
          <div class="col-4"><label>Person Capacity</label><input type="text" required pattern="[0-9]" name="personcapacity"></div>
          <div class="col-4"><label>Weight capacity(In KG)</label><input type="text" required name="weightcapacity"></div>
      		<!-- <div class="col-4"><label>mobile number</label>     <input type="text" name="mobile_number"></div> -->
      	</div>
      	<div class="row">
          <div class="col-4"><label>Brand Name</label><input type="text" name="brandname"></div>
          <div class="col-4"><label>Model Name</label><input type="text" name="modelname"></div>
          <!-- <div class="col-4"><label></label>Gender: Male       <input type="radio" name="gender" value="1">Female  <input type="radio" name="gender" value="2">other                                                         <input type="radio" name="gender" value="3"></div> -->
        </div>
        <div class="row">
          <div class="col-4">
            <label>Boat Logo</label>
          </div>
          <div class="col-4"><input type="file" name="boat_logo"></div>
        </div>
        <div class="row">
          <div class="col"><label>Day</label></div>
          <div class="col"><label>Departure time</label></div>
          <div class="col"><label>Arrival Time</label></div>
        </div>
        <div class="row">
          <div class="col-4"><label>Sunday</label></div>
          <div class="col-4"><select name="time[1][]" class="time_select"><option value="">Closed</option></select></div>
          <!-- <div class="input-group clock">
        <input type="text" class="form-control" value="" placeholder="Click to choose time">
        <span class="input-group-addon">
            <span class="glyphicon glyphicon-time"></span>
        </span>
        </div> -->
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
      <div class="modal-footer">
      	<button type="submit" class="add_btn">Add</button>
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
        <!-- <script>
var $input = $('.clock').clockpicker({
    default:          'now',
    placement:        'bottom', 
    align:            'left',
    donetext:         'Okay',
    autoclose:        false,
    vibrate:          true,
    fromnow:          00
});

$input.clockpicker('show');
</script> -->
</head>
