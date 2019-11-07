<?php
require "../../includes/admin/dbconnect.php";
// require"../../includes/admin/layout/head.php";
// require"../../includes/admin/layout/condition_check.php";
// require"../../includes/admin/layout/sidebar.php";
// require"../../includes/admin/dbconnect.php";



$token=$_GET['ticket'];
$get_ticket_detail="SELECT * FROM reserved_ticket_log WHERE ticket='".$token."'";
$execute_get_ticket_detail=mysqli_query($connect,$get_ticket_detail);
$ticket_data=mysqli_fetch_assoc($execute_get_ticket_detail);

$date=$ticket_data['bookedat'];
$get_journey_from="SELECT portid,portname FROM ports WHERE portid=".$ticket_data['portfrom'];
$get_journey_to="SELECT portid,portname FROM ports WHERE portid=".$ticket_data['portto'];
$execute_get_journey_to=mysqli_query($connect,$get_journey_to);
$execute_get_journey_from=mysqli_query($connect,$get_journey_from);
$journey_to=mysqli_fetch_assoc($execute_get_journey_to);
$journey_from=mysqli_fetch_assoc($execute_get_journey_from);
$date= date("d-M-Y", strtotime($date));
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
    <div class="home_container" style="width: 50%;display: unset !important;">
    <div id="home_link"><a href="../../index.php"> <-Home </a></div>
        <a href="book_ticket.php">Book Another Ticket</a>
                

         <div class="row">
            <div class="col">
                <label><b>Ticket : </b></label> <?= $ticket_data['ticket'] ?>
            </div>
            <div class="col">
                <label style="width: 60%;"><b>Number of Passengers : </b></label> <?= $ticket_data['number_of_passenger'] ?>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label><b>Journey From :</b></label> <?= $journey_from['portname']?>
            </div> 
            <div class="col"> 
                <label><b>Destination :</b></label> <?= $journey_to['portname'] ?>
            </div> 
        </div> 
        <div class="row"> 
            <div class="col"> 
                <label><b>Date :</b></label> <?= $date ?>
            </div> 
        </div> 
  
        
    </div>
</body>