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
<div class="col-10 header_container">
<h1 class=header_name>Ticket</h1>
</div>
<div class="container" onload="myfunc()">
    <div class="row">
            <div class="col">
<!-------------------------------container starts here----------------------->
            <!-- <div class="add_button">
					<a href="employee_register.php" class="btn btn-dark">Add Employee</a>
					<button type="button" class="btn btn-dark" data-toggle="modal" onclick="addemp()" data-target="#myModal">Add Employee</button>
                </div> -->
                <div class="wrapper col-5" style="float:left">
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
                <div class="wrapper col-6" style="float:right">
                <div class="section_header">Reserved Tickets</div>
                    <div id="reservation_form">
                        <form action="#" method="post">
                            Coming soon
                        </form>
                    </div>
                </div>
                       


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