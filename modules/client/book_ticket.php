<?php



?>
<head>
    <title>Boat Scheduling System</title>
    <link rel="stylesheet" href="../../style/style.css">
    <link rel="stylesheet" href="../../style/bootstrap.min.css">
</head>
<body id="book_ticket_body">
    <div class="home_container">
        <form method="post" action="#">
        <div class="row">
            <div class="col"><label><b>Journey Date :</b></label> <input type="text" name="journey_date" id="datepicker" placeholder="Click to choose Date"></div>
            <div class="col"><label><b>Journey Time :</b></label> <input type="text" class="clock" name="journey_time" placeholder="Click to choose time"></div>
        </div>
        <div class="row">
            <div class="col"><label><b>Name :</b></label> <input></div>
            <div class="col"><label><b>Name :</b></label> <input></div>
        </div>
        <div class="row">
            <div class="col"><label><b>Name :</b></label> <input></div>
            <div class="col"><label><b>Name :</b></label> <input></div>
        </div>
        <div class="row">
            <div class="col"><label><b>Name :</b></label> <input></div>
            <div class="col"><label><b>Name :</b></label> <input></div>
        </div>
        <div class="row">
            <div class="col"><label><b>Name :</b></label> <input></div>
            <div class="col"><label><b>Name :</b></label> <input></div>
        </div>
        <div class="row">
            <div class="col"><label><b>Name :</b></label> <input></div>
            <div class="col"><label><b>Name :</b></label> <input></div>
        </div>
        <div class="row">
            <div class="col"><label><b>Name :</b></label> <input></div>
            <div class="col"><label><b>Name :</b></label> <input></div>
        </div>

        </form>

    <!-- <div class="wrapper col" style="float:right">
                <div class="section_header">Reserved Tickets</div>
                <form action="../../scripts/admin/reserved_booking_script.php" method="post"  style="padding: 0px 15px;">
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
                                        <select name="journey_from" onchange="getdestination2(this.value)">
                                            <option>Select Station</option>
                                            <?php  
                                                while($result=mysqli_fetch_assoc($execute_query2))
                                                {
                                                    echo "<option value='".$result['portid']."'>".$result['portname']."</option>";
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <label>Destination Port</label>
                                    </div>
                                    <div class="col">
                                        <select name="journey_to" id="destination">
                                            <option>choose station
                                            </option>
                                        </select>
                                    </div>
                                </div>
                               <div class="traveler_details" id="test">
                                   <div class="wrapper" id="reservation_wrapper">
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
                                                <label>Gender</label>
                                                <input type="text" name="traveler[2][]">
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
                                <a href="#" class="btn btn-dark" onclick="addtraveler()">Add Details</a>

                        
                        
                    </div>
                <div class="section_footer"><!--<input type="button" onclick="addtraveler()"> --><!--<button type="submit">Book Reservation</button> </div>
                </form>
                </div>
 -->








    </div>
</body>
