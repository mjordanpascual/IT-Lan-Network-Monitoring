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

// Set New timezone
date_default_timezone_set('Asia/Manila');
$date = date('l | M-d-Y | h:i:s:a');
$year = date('Y');

// $displayTime2 = displayTime(); 

echo "<font face=Montserrat New style=color:green align=center><h3 style=margin-bottom:5px>$date</h3></font>";

// echo "<h1>$displayTime2</h1>";

//Create table showing the results for iHOMIS
$iplistIhomis = array
(
    // array("172.16.3.220", "IT-DEPARTMENT"),
    
    array("192.168.5.21", "HEMODIALYSIS-iHOMIS"),
    array("192.168.5.40", "iHOMIS-ICU"),
    array("192.168.5.15", "ADMITTING1-iHOMIS"),
    array("192.168.5.24", "ADMITTING2-iHOMIS"),
    array("192.168.5.65", "iHOMIS-ER"),
    array("192.168.5.68", "BILLING-MARVIE-iHOMIS"),
    array("192.168.5.62", "BILLING-PC-iHOMIS"),
    array("192.168.5.60", "BILLING-JESSE-iHOMIS"),
    array("192.168.5.37", "DESKTOP-4T4S424-iHOMIS"),
    array("192.168.5.14", "BILLING-SERVER-iHOMIS"),
    array("192.168.5.2", "DESKTOP-MPCERE2-iHOMIS"),
    array("192.168.5.22", "BILLING-1-iHOMIS"),
    array("192.168.5.16", "BILLING-4-iHOMIS"),
    array("192.168.5.44", "FAMILY PLANNING-iHOMIS"),
    array("192.168.5.46", "PC-OB-WARD"),
    array("192.168.5.32", "ULTRASOUND-iHOMIS"),
    array("192.168.5.52", "MS-WARD-1-iHOMIS"),
    array("192.168.5.69", "NICU-iHOMIS"),
    array("192.168.5.35", "OR-iHOMIS")
);
$i = count($iplistIhomis);
$results = [];

for($j=0;$j<$i;$j++){
    $ip = $iplistIhomis[$j][0];
    $ping = exec("ping -n 1 -w 1 $ip", $output, $status);
    $results[] =  $status;
}

// Table for iHOMIS
echo "<div align=center>";
// echo "<font face=Montserrat New style=color:green><h3 style=margin-bottom:0>$date</h3></font>";
echo '<font face=Courier New>';
echo "<table border=1 style=border-collapse:collapse>
<th colspan=4 style=font-size:22px width=380>iHOMIS Monitoring</th>
<tr style=font-weight:bold>
    <td align=center width=30>#</td>
    <td align=center>IP/URL Description</td>
    <td align=center width=50>Stat</td>
</tr>";
foreach($results as $item =>$k){
    echo '<tr align=center id="tableTr">';
    echo '<td>'.$item.'</td>';
    // echo '<td>'.$iplist[$item][0].'</td>';
    echo '<td align=left>'.$iplistIhomis[$item][1].'</td>';
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

echo '</br>';
echo '</br>';

//Create table showing the results for Internet
$iplistInternet = array
(
    // array("172.16.3.229", "I.T"),
    array("172.16.3.221", "Ospar-Lab"),
    array("172.16.3.222", "MEDICAL RECORDS(SIR ERIC)"),
    array("172.16.3.223", "OP1-ADMIN"),
    array("172.16.3.224", "OP1-Medicine"),
    array("172.16.3.225", "PROPERTY"),
    array("172.16.3.226", "OP1-DIALYSIS"),
    array("172.16.3.227", "Family Planning"),
    array("172.16.3.228", "Ospital ng Paranaque 6th Flr"),
    array("172.16.3.230", "TP-Link_BE7A - DIETARY"),
    // array("172.16.3.231", "Family Planning"),
    array("172.16.3.232", "OP1-PT"),
    array("172.16.3.233", "OP1 - Doctor's Lounge"),
    array("172.16.3.234", "MALASAKIT"),
    array("172.16.3.235", "OPD"),
    array("172.16.3.236", "MSS"),
    array("172.16.3.237", "OP1-UTZ"),
    array("172.16.3.238", "OP1-AP | ACCOUNTING"),
    array("172.16.3.240", "OP1-Consultant"),
    array("172.16.3.241", "OP1-N.S.O"),
    // array("172.16.3.242", "DIRECTOR'S OFFICE"),
    array("172.16.3.243", "OP1-OR"),
    array("172.16.3.245", "OP1-CWU"),
    array("172.16.3.246", "OP1-DR"),
    array("172.16.3.247", "OP1-OB Ward"),
    array("172.16.3.248", "OP1-ADMITTING"),
    array("172.16.3.249", "RADIOLOGY"),
    array("172.16.3.250", "IT_EXTENSION(as SWITCH)"),
    array("172.16.3.251", "Ospital ng Parañaque-Ground"),
    array("172.16.3.252", "OP1-ICU"),
    // array("172.16.3.253", "EMERGENCY ROOM TO ADMITTING"),
    array("172.16.3.253", "Ospital ng Paranaque | ER"),
    array("iHOMIS-ER", "ER-DESKTOP-INTERNET"),
    array("172.16.3.254", "Ospital ng Paranaque | HR")
);

$i = count($iplistInternet);
$results = [];

for($j=0;$j<$i;$j++){
    $ip = $iplistInternet[$j][0];
    $ping = exec("ping -n 1 -w 1 $ip", $output, $status);
    $results[] =  $status;
}

// Table for Internet
echo "<div align=center>";
echo '<font face=Courier New>';
echo "<table border=1 style=border-collapse:collapse>
<th colspan=4 style=font-size:22px width=380>Internet Monitoring</th>
<tr style=font-weight:bold>
    <td align=center width=30>#</td>
    <td align=center>IP/URL Description</td>
    <td align=center width=50>Stat</td>
</tr>";
foreach($results as $item =>$k){
    echo '<tr align=center id="tableTr">';
    echo '<td>'.$item.'</td>';
    // echo '<td>'.$iplist[$item][0].'</td>';
    echo '<td align=left>'.$iplistInternet[$item][1].'</td>';
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

<!-- <footer style=font-family:Montserrat;text-align:center;padding:8px;>Copyright &#169; <?php echo $year ?> | OSPAR1 | IT-Department</footer> -->
<footer style=font-family:Montserrat;text-align:center;padding:8px;>Copyright &#169; 2022 | OSPAR1 | IT-Department</footer>

<script src="./index.js"></script>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>