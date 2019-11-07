<?php
require "../../includes/admin/dbconnect.php";
require"../../includes/admin/layout/head.php";
require"../../includes/admin/layout/condition_check.php";
require"../../includes/admin/layout/sidebar.php";
require"../../includes/admin/dbconnect.php";



$token=$_GET['token'];
$get_ticket_detail="SELECT * FROM unreserved_ticket_log WHERE token='".$token."'";
$execute_get_ticket_detail=mysqli_query($connect,$get_ticket_detail);
$ticket_data=mysqli_fetch_assoc($execute_get_ticket_detail);
// echo "<pre>";
// print_r($ticket_data);
// echo "</pre>";
$date=$ticket_data['bookedat'];
$get_journey_from="SELECT portid,portname FROM ports WHERE portid=".$ticket_data['portfrom'];
$get_journey_to="SELECT portid,portname FROM ports WHERE portid=".$ticket_data['portto'];
$execute_get_journey_to=mysqli_query($connect,$get_journey_to);
$execute_get_journey_from=mysqli_query($connect,$get_journey_from);
$journey_to=mysqli_fetch_assoc($execute_get_journey_to);
$journey_from=mysqli_fetch_assoc($execute_get_journey_from);
$date= date("d-M-Y", strtotime($date));



?>
<div class="col-10 header_container">
<h1 class=header_name>Print Ticket</h1>
</div>
<div class="container">
    <div class="row">
            <div class="col">
                <a href="generate_token.php">Book Another Ticket</a>
                <div class="wrapper" id="ticket_container">
                    <div class="row">
                        <div class="col">
                            <label><b>Token : </b></label> <?= $ticket_data['token'] ?>
                        </div>
                        <div class="col">
                            <label><b>Number of Passengers : </b></label> <?= $ticket_data['number_of_passenger'] ?>
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
                        <!-- <div class="col"> 
                            <label><b>Token :</b></label> <?= $ticket_data['token'] ?>
                        </div>  -->
                    </div> 
                    <!-- <div class="row"> 
                        <div class="col"> 
                            <label><b>Token :</b></label> <?= $ticket_data['token'] ?>
                        </div> 
                        <div class="col"> 
                            <label><b>Token :</b></label> <?= $ticket_data['token'] ?>
                        </div>
                    </div> -->
                </div>
            </div>
    </div>
</div>



