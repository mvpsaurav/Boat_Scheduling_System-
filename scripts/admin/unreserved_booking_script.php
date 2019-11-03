<?php
require "../../includes/admin/dbconnect.php";

function random_strings($length_of_string) 
{ 
    $boatnumber=$_POST['boatnumber'];
    $aplha_result = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ'; 
    $numeric_result = '0123456789'; 
    $character=substr(str_shuffle($aplha_result),0, $length_of_string); 
    $number=substr(str_shuffle($numeric_result),0, $length_of_string); 
    $random_character=$boatnumber."_".$character."_".$number;
    return ($random_character);
} 
$token=random_strings(3); 
$boatid=$_POST['boatid'];
$journey_from=$_POST['journey_from'];
$journey_to=$_POST['journey_to'];
$boatnumber=$_POST['boatnumber'];
$availableseats=$_POST['availableseats'];
$tripid=$_POST['tripid'];
$number_of_passengers=$_POST['number_of_passengers'];
$date=date("Y-m-d");
$createdat=date("Y-m-d H:i:s");
if(empty($number_of_passengers))
{
    header("Location: ../../modules/admin/generate_token.php?invalid=nopassengers");
}
else
{
    
    if(empty($tripid))
    {
        $availableseats=$availableseats-$number_of_passengers;
        $create_trip_query="INSERT INTO trips (tripnumber,boatid,tripdate,availableseats,createdat) VALUES ('1','".$boatid."','".$date."','".$availableseats."','".$createdat."')";
        if($execute_create_trip_query=mysqli_query($connect,$create_trip_query))
        {
            $get_tripid_query="SELECT LAST_INSERT_ID();";
            $execute_get_tripid_query=mysqli_query($connect,$get_tripid_query);
            $tripid_array=mysqli_fetch_assoc($execute_get_tripid_query);
            $tripid=$tripid_array['LAST_INSERT_ID()']; 
            $create_ticket_query="INSERT INTO unreserved_ticket_log (portfrom,portto,boatid,number_of_passenger,tripid,token,bookedat) VALUES ('".$journey_from."','".$journey_to."','".$boatid."','".$number_of_passengers."','".$tripid."','".$token."','".$createdat."')";
            if($execute_create_ticket_query=mysqli_query($connect,$create_ticket_query))
            {
                header("Location: ../../modules/admin/print_unreserved_ticket.php?ticket=generated&token=".$token);
            }
        }
    }
    else
    {
        $availableseats=$availableseats-$number_of_passengers;
        $create_ticket_query="INSERT INTO unreserved_ticket_log (portfrom,portto,boatid,number_of_passenger,tripid,token,bookedat) VALUES ('".$journey_from."','".$journey_to."','".$boatid."','".$number_of_passengers."','".$tripid."','".$token."','".$createdat."')";
        if($execute_create_ticket_query=mysqli_query($connect,$create_ticket_query))
            {
                $update_trip_query="UPDATE trips SET availableseats='".$availableseats."',updatedat='".$createdat."'";
                if($execute_update_trip_query=mysqli_query($connect,$update_trip_query))
                {
                header("Location: ../../modules/admin/print_unreserved_ticket.php?ticket=generated&token=".$token); 
                }
            }
    }



}
