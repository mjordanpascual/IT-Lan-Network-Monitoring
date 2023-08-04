<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IT-OP1 | Network Monitoring App</title>

     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        #tableTr:hover {background-color: #DFE4E2; font-weight: bold; transition: 0.3s;}
    </style>

</head>
<body>

<?php
// $ip = "172.16.3.250";
// $ping = exec("ping -n 1 $ip", $output, $status);
// echo $status; // 0:successful, 1:unsuccessful.

// Multi IP
// $iplist = ["172.16.3.254", "172.16.3.220"];
// $i = count($iplist);

// for($j=0;$j<$i;$j++){
//     $ip = $iplist[$j];
//     $ping = exec("ping -n 1 -w 1 $ip", $output, $status);
//     echo $status;
//     echo '<br/>';
// }

// Add description of the IP/URL
// $iplist = array
// (   
//     array("172.16.2.220","My Desktop"),
//     array("192.168.5.100","iHOMIS SERVER")
// );

// $i = count($iplist);

// for($j=0;$j<$i;$j++){
//     $ip = $iplist[$j][0];
//     $ping = exec("ping -w 1 $ip", $output, $status);
//     echo "Ping ".$iplist[$j][0].' '.$iplist[$j][1].' ';
//     echo $status;
//     echo "<br/>";
// }
echo header("refresh: 10");
//Create table showing the results
$iplist = array
(
    // array("172.16.3.220", "IT-DEPARTMENT"),
    array("172.16.3.221", "Ospar-Lab"),
    array("172.16.3.222", "MEDICAL RECORDS(SIR ERIC)"),
    array("172.16.3.223", "OP1-ADMIN"),
    array("172.16.3.224", "OP1-Medicine"),
    array("172.16.3.225", "PROPERTY"),
    array("172.16.3.226", "OP1-DIALYSIS"),
    array("172.16.3.227", "Ospital ng Paranaque Ground"),
    array("172.16.3.228", "Ospital ng Paranaque 6th Flr"),
    array("172.16.3.229", "ER-STATION"),
    array("172.16.3.230", "TP-Link_BE7A - DIETARY"),
    array("172.16.3.231", "Family Planning"),
    // array("172.16.3.232", "DRA CHERRY SANTOS(CANCELLED)"),
    array("172.16.3.233", "OP1 - Doctor's Lounge"),
    array("172.16.3.234", "MALASAKIT"),
    array("172.16.3.235", "OPD"),
    array("172.16.3.236", "MSS"),
    array("172.16.3.237", "tempvllsn SIR CRIS"),
    array("172.16.3.238", "OP1-AP | ACCOUNTING"),
    array("172.16.3.239", "OP1-Pedia Ward | TL-WR840N (TRANSFER TO E.R. TENT)"),
    array("172.16.3.240", "OP1-Consultant"),
    array("172.16.3.241", "OP1-N.S.O"),
    array("172.16.3.242", "DIRECTOR'S OFFICE"),
    array("172.16.3.243", "OP1-OR"),
    // array("172.16.3.244", "OP1-DR"),
    array("172.16.3.246", "OP1-DR"),
    array("172.16.3.245", "OP1-CWU"),
    // array("172.16.3.246", "OP1-CT-SCAN-(RE-CONFIGURE BY GE ENGINEER)"),
    array("172.16.3.247", "OP1-OB Ward"),
    array("172.16.3.248", "E-CLAIMS"),
    array("172.16.3.249", "RADIOLOGY"),
    // array("172.16.3.250", "CT-GE-MACHINE-DEDICATED-TPLINK AP"),
    // array("172.16.3.251", "OP1-SURVEILLANCE"),
    // array("172.16.3.252", "Ospital ng Paranaque | CONFERENCE"),
    array("172.16.3.253", "Ospital ng Paranaque | ER"),
    array("172.16.3.254", "Ospital ng Paranaque | HR"),
    array("192.168.5.15", "ADMITTING1-iHOMIS"),
    array("192.168.5.24", "ADMITTING2-iHOMIS"),
    array("192.168.5.132", "ER-iHOMIS"),
    array("IHOMIS-ER1", "ER-DESKTOP-INTERNET"),
    array("192.168.5.68", "BILLING-MARVIE-iHOMIS"),
    array("192.168.5.62", "BILLING-PC-iHOMIS"),
    array("192.168.5.60", "BILLING-JESSE-iHOMIS"),
    array("192.168.5.37", "DESKTOP-4T4S424-iHOMIS)"),
    array("192.168.5.14", "BILLING-SERVER-iHOMIS"),
    array("192.168.5.2", "DESKTOP-MPCERE2-iHOMIS"),
    array("192.168.5.22", "BILLING-1-iHOMIS"),
    array("192.168.5.16", "BILLING-4-iHOMIS"),
    array("192.168.5.46", "OB-WARD-1-iHOMIS"),
    array("192.168.5.52", "MS-WARD-1-iHOMIS"),
    array("192.168.5.69", "NICU-iHOMIS"),
    array("192.168.5.35", "OR-iHOMIS")
);
$i = count($iplist);
$results = [];

for($j=0;$j<$i;$j++){
    $ip = $iplist[$j][0];
    $ping = exec("ping -n 1 -w 1 $ip", $output, $status);
    $results[] =  $status;
}

// Set New timezone
date_default_timezone_set('Asia/Manila');
$date = date('l | M-d-Y | h:i:s:a');

// Table
echo "<div align=center>";
echo "<font face=Montserrat New style=color:green><h3 style=margin-bottom:0>$date</h3></font>";
echo '<font face=Courier New>';
echo "<table border=1 style=border-collapse:collapse>
<th colspan=4>IT-Network Internet and iHOMIS Monitoring</th>
<tr style=font-weight:bold>
    <td align=center width=30>#</td>
    <td align=center>IP/URL Description</td>
    <td align=center width=50>Stat</td>
</tr>";
foreach($results as $item =>$k){
    echo '<tr align=center id="tableTr">';
    echo '<td>'.$item.'</td>';
    // echo '<td>'.$iplist[$item][0].'</td>';
    echo '<td align=left>'.$iplist[$item][1].'</td>';
    if($results[$item] == 0){
        echo '<td style=color:green><strong><i class="fa-solid fa-check fa-beat-fade"></i></strong></td>';
    } else {
        echo '<td style=color:red><strong><i class="fa-regular fa-circle-xmark fa-fade"></i></strong></td>';
    }
    echo '</tr>'; 
}
echo "</table>";
echo '</font>';
echo "</div>";

?>

<footer style=font-family:Montserrat;text-align:center;padding:8px>&#169;2023 OSPAR | IT-Department</footer>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>