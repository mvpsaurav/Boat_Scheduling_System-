<?php
require"../../includes/admin/layout/head.php";
require"../../includes/admin/layout/condition_check.php";
require"../../includes/admin/layout/sidebar.php";
// require"../../includes/admin/layout/header.php";
require"../../includes/admin/dbconnect.php";

$port_query="SELECT * FROM ports";
$execute_query=mysqli_query($connect,$port_query);
$index=1;
?>
<link rel="stylesheet" href="../../style/jquery-ui.css">      
<script src="../../scripts/JS/jquery-ui.js"></script>
<div class="col-10 header_container">
<h1 class=header_name>Ticket</h1>
</div>
<div class="container">
    <div class="row">
            <div class="col">
<!-------------------------------container starts here----------------------->
            <!-- <div class="add_button">
					<a href="employee_register.php" class="btn btn-dark">Add Employee</a>
					<button type="button" class="btn btn-dark" data-toggle="modal" onclick="addemp()" data-target="#myModal">Add Employee</button>
                </div> -->
                <div class="wrapper col col-lg-4" style="float:left">
                <div class="section_header">Unreserved Tickets</div>
                  <div id="token_form">
                    <form action="#" method="post">
                        <div class="row">
                            <div class="col"><label>Boat Name</label></div> <div class="col" id="boat_name"></div>
                        </div>
                        <div class="row">
                            <div class="col"><label>Boat ID</label></div> <div class="col" id="boat_id"></div>
                        </div>
                        <div class="row">
                        <div class="col">
                            <label>Available Seats</label></div> <div class="col" id="available_seats"></div>                            
                        </div>
                        <div class="row">
                            <div class="col"><label>Select Boarding Port</label></div> <div class="col"><select name="journey_from" id="journey_from" onchange="getdestination(this.value)"><option>Select Station</option>
                            <?php  
                                while($result=mysqli_fetch_assoc($execute_query))
                                {
                                    echo "<option value='".$result['portid']."'>".$result['portname']."</option>";
                                }
                            ?>
                            </select></div>
                        </div>
                        <div class="row">
                            <div class="col"><label>Select Destination Port</label> </div> <div class="col"><select name="journey_from" id="journey_to" onchange="getboat(this.value)"><option>Select Boarding Station</option>
                            </select></div>
                        </div>
                        <div class="row">
                            <div class="col"><label>Number of Passengers</label> </div> <div class="col"><input type="text" name="number_of_passengers"></div>
                        </div>
                        <div class="row">
                            <div class="col"></div>
                            <div class="col"><button type="submit">Generate Ticket</button></div>
                        </div>
                    </form>
                  </div>
                </div>
                <div class="wrapper col col-lg-7" style="float:right">
                <form action="../../scripts/admin/reserved_booking_script.php" method="post">
                    <div class="section_header">Reserved Tickets</div>
                        <div id="reservation_form">
                        
                                <div class="row">
                                    <div class="col">
                                        <label>Journey Date</label>
                                    </div>
                                    <div class="col">
                                    <input type="text" name="journey_date" id="datepicker" placeholder="Click to choose Date">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <label>Journey Time</label>
                                    </div>
                                    <div class="col">
                                    <input type="text" class="clock" name="journey_time" placeholder="Click to choose time">
                                    </div>
                                </div>
                                <div class="row">
                                <div class="col">
                                        <label>Boarding Port</label>
                                    </div>
                                    <div class="col">
                                        <select name="journey_from">
                                            <option>choose station
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <label>Destination Port</label>
                                    </div>
                                    <div class="col">
                                        <select name="journey_to">
                                            <option>choose station
                                            </option>
                                        </select>
                                    </div>
                                </div>
                               <div class="traveler_details" id="test">
                                   <div class="wrapper">
                                       <div class="row">
                                           <div class="col">
                                               <label>Name</label>
                                               <input type="text" name="traveler[]['name']">
                                           </div>
                                           <div class="col">
                                                <label>Age</label>
                                                <input type="text" name="traveler[]['age']">
                                           </div>
                                           <div class="col">
                                                <label>Gender</label>
                                                <input type="text" name="traveler[]['gender']">
                                           </div>
                                       </div>
                                       <div class="row">
                                           <div class="col">
                                               <label>ID Type</label>
                                               <input type="text" name="traveler[]['idtype']">
                                           </div>
                                           <div class="col">
                                               <label>ID Number</label>
                                               <input type="text" name="traveler[]['id']">
                                           </div>
                                           <div class="col">
                                               <label>Contact Number</label>
                                               <input type="text" name="traveler[]['contact']">
                                           </div>
                                       </div>
                                   </div>
                               </div>
                                <a href="#" class="btn btn-dark" onclick="addtraveler()">Add Details</a>

                        
                        
                    </div>
                <div class="section_footer"><!--<input type="button" onclick="addtraveler()"> --><button type="submit">Book Reservation</button> </div>
                </form>
                </div>
                       



                <!-- <div class="input-group clock">
        <input type="text" class="form-control" value="" placeholder="Click to choose time">
        <span class="input-group-addon">
            <span class="glyphicon glyphicon-time"></span>
        </span>
    </div> -->






<!-------------------------------container ends here----------------------->
            </div>
    </div>
</div>
<script>
    function getdestination(portid)
    {
        $.ajax({
		type:"POST",
		url:"../../scripts/admin/getdestination.php",
		data:"portid="+portid,
		success:function(response)
        {
		   $("#journey_to").html(response);
		}

		 })
    }
    function getboat(portid)
    {   
        var a = $('#journey_from').val();;
        $.ajax({
		type:"POST",
		url:"../../scripts/admin/getboat.php",
		data:{journeyto : portid,journeyfrom : a},
		success:function(response)
        {
            // console.log(response);
		//    $("#boat_name").html(response);
           var data=response.split("-");
            var name=data[0];
            var id=data[1];
		   $("#boat_name").html(name);
           $("#boat_id").html(id);
		}

		 })
    }
</script>
<script>
var $input = $('.clock').clockpicker({
    default:          'now',
    placement:        'bottom', 
    align:            'left',
    donetext:         'Okay',
    autoclose:        false,
    vibrate:          true,
    fromnow:          00
});

$input.clockpicker('hidden');
</script>
  <script>
  $( function() {
    $( "#datepicker" ).datepicker();
  } );
  </script>
  <script>
      function addtraveler()
      {
        var fields= '<div class="wrapper"><div class="row"><div class="col"><label>Name</label><input type="text" name="traveler[]['+"'name'"+']"></div><div class="col"><label>Age</label><input type="text" name="traveler[]['+"'age'"+']"></div><div class="col"><label>Gender</label><input type="text" name="traveler[]['+"'gender'"+']"></div></div><div class="row"><div class="col"><label>ID Type</label><input type="text" name="traveler[]['+"'idtype'"+']"></div><div class="col"><label>ID Number</label><input type="text" name="traveler[]['+"'id'"+']"></div><div class="col"><label>Contact Number</label><input type="text" name="traveler[]['+"'contact'"+']"></div></div></div>';
        $("#test").append(fields);        
      }
    </script>