<?php 
require "../../includes/admin/dbconnect.php";
$journey_date=$_POST['journey_date'];
$journey_time=$_POST['journey_time'];
$boatid=$_POST['boatid'];
$journey_from=$_POST['journey_from'];
$journey_to=$_POST['journey_to'];
$traveler_details=$_POST['traveler'];
$count=count($traveler_details);
$count_rows=count($traveler_details[0]);
function random_strings($length_of_string) 
{ 
    $boatid=$_POST['boatid'];
    $aplha_result = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ'; 
    $numeric_result = '0123456789'; 
    $character=substr(str_shuffle($aplha_result),0, $length_of_string); 
    $number=substr(str_shuffle($numeric_result),0, $length_of_string); 
    $random_character=$boatid."_".$character."_".$number;
    return ($random_character);
} 
$ticket=random_strings(4); 
for($a=0;$a<$count_rows;$a++)
{
    for($b=0;$b<$count;$b++)
    {
        $users[$a][]= $traveler_details[$b][$a];
    }
}
if(!empty($journey_date || $journey_time || $boatid || $journey_from || $journey_to))
{
    $create_ticket_query="INSERT INTO reserved_ticket_log (boatid,number_of_passenger,portfrom,portto,ticket,paymentid) VALUES ('".$boatid."','".$count_rows."','".$journey_from."','".$journey_to."','".$ticket."','')";
    if($execute_create_ticket_query=mysqli_query($connect,$create_ticket_query))
    {
        $get_ticketid_query="SELECT LAST_INSERT_ID();";
        $execute_get_ticketid_query=mysqli_query($connect,$get_ticketid_query);
        $ticketid_array=mysqli_fetch_assoc($execute_get_ticketid_query);
        $ticketid=$ticketid_array['LAST_INSERT_ID()']; 
        foreach($users as $user)
        {
            // echo $user[0];
            $create_passengers_query="INSERT INTO reserved_passengers (ticketid,name,age,gender,idtype,idnumber,contact) VALUES ('".$ticketid."','".$user[0]."','".$user[1]."','".$user[2]."','".$user[3]."','".$user[4]."','".$user[5]."')";
            $execute_create_passengers_query=mysqli_query($connect,$create_passengers_query);
        }        
        header("Location: ../../modules/client/print_reserved_ticket.php?ticket=generated&ticket=".$ticket);
    }
}


