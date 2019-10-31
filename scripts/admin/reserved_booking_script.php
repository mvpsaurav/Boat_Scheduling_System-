<?php 
$journey_date=$_POST['journey_date'];
$journey_time=$_POST['journey_time'];
$journey_from=$_POST['journey_from'];
$journey_to=$_POST['journey_to'];
$traveler_details=$_POST['traveler'];
// foreach($traveler_details as $data)
// {
// // $count=count($data);
//     echo $data[0];
//     for($a=0,$a<$count)
//     // while($a<$count)
//     // {
//     //     echo $data[$a];
//     //     $a++;
//     // }
// }

$count=count($traveler_details);
$count_rows=count($traveler_details[1]);

for($a=0;$a<$count_rows;$a++)
{
    for($b=0;$b<$count;$b++)
    {
        $traveler_details[$b][$a];
    }
    // echo "<br>";

}
