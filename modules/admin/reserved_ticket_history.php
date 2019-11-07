<?php
require"../../includes/admin/layout/head.php";
require"../../includes/admin/layout/condition_check.php";
require"../../includes/admin/layout/sidebar.php";
require"../../includes/admin/dbconnect.php";

$select_ticktes_query="SELECT * FROM reserved_ticket_log";
$execute_select_ticktes_query=mysqli_query($connect,$select_ticktes_query);
$select_ports_query="SELECT portname,portid FROM ports";
$execute_select_ports_query=mysqli_query($connect,$select_ports_query);
while($ports_data=mysqli_fetch_assoc($execute_select_ports_query))
{
    $ports[]=$ports_data;
}
$select_boat_details_query="SELECT boatid,boatnumber,boatname FROM boatdetails";
$execute_select_boat_details_query=mysqli_query($connect,$select_boat_details_query);
while($boats_data=mysqli_fetch_assoc($execute_select_boat_details_query))
{
    $boats[]=$boats_data;
}
$index=1;


?>
<div class="col-10 header_container">
<h1 class=header_name>Ticket Log</h1>
</div>
<div class="container">
    <div class="row">
        <div class="col">
        <table id="tickets_list" class="table customtable table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Ticket Number</th>
                    <th scope="col">Number of Passengers</th>
                    <th scope="col">Boat Number</th>
                    <th scope="col">Boat Name</th>
                    <th scope="col">Journey From</th>
                    <th scope="col">Journey To</th>
                    <th scope="col">Booked At</th>
                </tr>
            </thead>
            <tbody>
            <?php 
            while($ticket_data=mysqli_fetch_assoc($execute_select_ticktes_query))
            {
            ?>
            <tr>
                <td><?=$index?></td>
                <td><?=$ticket_data['ticket']?></td>
                <td><?=$ticket_data['number_of_passenger']?></td>
                <td>
                    <?php 
                        foreach($boats as $boat)
                        {
                            if($boat['boatid']==$ticket_data['boatid'])
                            {
                                echo $boat['boatnumber'];
                            }
                        }
                    ?>
                </td>
                <td>
                    <?php 
                         foreach($boats as $boat)
                         {
                             if($boat['boatid']==$ticket_data['boatid'])
                             {
                                 echo $boat['boatname'];
                             }
                         }
                    ?>
                </td>
                <td>
                    <?php 
                        foreach($ports as $port)
                        {
                            if($port['portid']==$ticket_data['portfrom'])
                            {
                                echo $port['portname'];
                            }
                        }
                    ?>
                </td>
                <td>
                    <?php
                    foreach($ports as $port)
                        {
                            if($port['portid']==$ticket_data['portto'])
                            {
                                echo $port['portname'];
                            }
                        }
                    ?>
                </td>
                <td><?=$ticket_data['bookedat']?></td>
            </tr>
            <?php   
            $index++;
            }
            ?>
            </tbody>
            <tfoot class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Ticket Number</th>
                    <th scope="col">Number of Passengers</th>
                    <th scope="col">Boat Number</th>
                    <th scope="col">Boat Name</th>
                    <th scope="col">Journey From</th>
                    <th scope="col">Journey To</th>
                    <th scope="col">Booked At</th>
                </tr>
            </tfoot>

        </table>






        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
    $('#tickets_list').DataTable();
} );
</script>