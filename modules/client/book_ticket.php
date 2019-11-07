<?php
require"../../includes/admin/dbconnect.php";
$port_query="SELECT * FROM ports";
$execute_query=mysqli_query($connect,$port_query);
$execute_query2=mysqli_query($connect,$port_query);
$index=1;


?>
<head>
    <title>Boat Scheduling System</title>
    <link rel="stylesheet" href="../../style/style.css">
    <link rel="stylesheet" href="../../style/bootstrap.min.css">
    <link rel="stylesheet" href="../../style/bootstrapdatatable.min.css">      
    <link rel="stylesheet" href="../../style/jquery-clockpicker.min.css">      
    <script src="../../scripts/JS/jquery-3.3.1.slim.min.js"></script>
    <script src="../../scripts/JS/popper.min.js"></script>
    <script src="../../scripts/JS/bootstrap.min.js"></script>
    <script src="../../scripts/JS/jquery.js"></script>
    <script src="../../scripts/JS/bootstrapdatatable.js"></script>
    <script src="../../scripts/JS/jquerydatatable.js"></script>
    <script src="../../scripts/JS/sweetalert.js"></script>
    <script src="../../scripts/JS/jquery-clockpicker.min.js"></script>
    <link rel="stylesheet" href="../../style/jquery-ui.css">      
    <script src="../../scripts/JS/jquery-ui.js"></script>




</head>
<body id="book_ticket_body">
    <div class="home_container" style="width: 50%;">
        <div id="home_link"><a href="../../index.php"> <-Home </a></div>
        <form action="../../scripts/client/reserved_booking_script.php" method="post" style="width: 100%;">
        <div class="row">
            <div class="col"><label><b>Journey Date :</b></label> <input type="text" name="journey_date" id="datepicker" placeholder="Click to choose Date"></div>
            <div class="col"><label><b>Journey Time :</b></label> <input type="text" class="clock" name="journey_time" placeholder="Click to choose time"></div>
        </div>
        <div class="row">
            <div class="col"><label><b>Boarding Port :</b></label>  
                <select name="journey_from" id="source" onchange="getdestination(this.value)">
                    <option>Select Station</option>
                    <?php  
                        while($result=mysqli_fetch_assoc($execute_query2))
                        {
                            echo "<option value='".$result['portid']."'>".$result['portname']."</option>";
                        }
                    ?>
                </select>
            </div>
            <div class="col"><label><b>Destination Port :</b></label>
                <select name="journey_to" id="destination" onchange="get_reserved_boat(this.value)">
                    <option>Choose Station</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col"><label><b>Boats :</b></label> 
                <select id="reserved_boats" name="boatid">
                    <option>Select Destination</option>
                </select>
            </div>
            <div class="col"><button type="button" class="btn-1" onclick="addtraveler()">Add Passenger</button>
            </div>
        </div>
            <div class="home_passenger_container" id="test">
                <div class="passenger_card_body">
                    <div class="row">
                        <div class="col">
                            <label>Name</label>
                            <input type="text" name="traveler[0][]">
                        </div>
                        <div class="col">
                            <label>Age</label><br>
                            <input type="text" name="traveler[1][]">
                        </div>
                        <div class="col">
                            <label>Gender</label><br>
                            <select name="traveler[2][]"><option value="1">Male</option><option value="2">Female</option><option value="3">Other</option></select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label>ID Type</label>
                            <input type="text" name="traveler[3][]">
                        </div>
                        <div class="col">
                            <label>ID Number</label>
                            <input type="text" name="traveler[4][]">
                        </div>
                        <div class="col">
                            <label>Contact Number</label>
                            <input type="text" name="traveler[5][]">
                        </div>
                    </div>
                </div>
            </div>
            <button class="btn-1" type="submit" id="book_ticket_button">Book Ticket</button>

        </div>
  
        
        </form>
    </div>
</body>



<script>
    function getdestination(portid)
    {
        $.ajax({
		type:"POST",
		url:"../../scripts/admin/getdestination.php",
		data:"portid="+portid,
		success:function(response)
        {
		   $("#destination").html(response);
		}
		 })
    }
    function getboat(portid)
    {   
        alert(portid);
      var a = $('#journey_from').val();
      $.ajax({
    		type:"POST",
    		url:"../../scripts/admin/getboat.php",
    		data:{journeyto : portid,journeyfrom : a},
    		success:function(response)
        {
            console.log(response);
           var data=response.split("&");
		   $("#boat_name").html(data[0]);
            $("#boat_number").html(data[1]);
            $("#available_seats").html(data[2]);
            $("#input_container").html(data[3]);
		}

		 })
    }
    function changeboat(boatid)
    {
        // alert(boatid);   
      $.ajax({
    		type:"POST",
    		url:"../../scripts/admin/change_boat.php",
    		data:"boatid="+boatid,
    		success:function(response)
            {
            // $("#destination").html(response);
            // alert(response);
            // console.log(response);
            var data=response.split("&");
            $("#boat_number").html(data[0]);
            $("#available_seats").html(data[1]);
            $("#input_container").html(data[2]);
            // console.log(data);

            }
        })     
    }
    function get_reserved_boat(portid)
    {
      var a = $('#source').val();;
      // console.log(a);
      $.ajax({
        type:"POST",
        url:"../../scripts/admin/get_reserved_boat.php",
        data:{journeyto : portid,journeyfrom : a},
        success:function(response)
        {
            console.log(response);
            $("#reserved_boats").html(response);
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
        var fields= ' <div class="passenger_card_body"><div class="row"><div class="col"><label>Name</label><input type="text" name="traveler[0][]"></div><div class="col"><label>Age</label><br><input type="text" name="traveler[1][]"></div><div class="col"><label>Gender</label><br><select name="traveler[2][]"><option value="1">Male</option><option value="2">Female</option><option value="3">Other</option></select></div></div><div class="row"><div class="col"><label>ID Type</label><input type="text" name="traveler[3][]"></div><div class="col"><label>ID Number</label><input type="text" name="traveler[4][]"></div><div class="col"><label>Contact Number</label><input type="text" name="traveler[5][]"></div></div></div>';
        $("#test").append(fields);        
      }
    </script>