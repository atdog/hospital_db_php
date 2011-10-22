<?php
header('Content-type: text/javascript');
require_once('db_conn.php');  // connect DB hellocap_db; you need to change the value of $DB_HOST in file db_conn.php
$cb = $_GET['callback'];
$hospitalId = $_GET['hospitalId'];
$deptId = $_GET['deptId'];
$doctorId = $_GET['doctorId'];
$time = $_GET['time'];
$rid = $_GET['rid'];

if ( preg_match('/(.*) (\d{2}):\d{2}:\d{2}/',$time,$regs) ) {
    switch ($regs[2]) {
        case '09':
            $time = $regs[1]."-"."A";
            break;
        case '12':
            $time = $regs[1]."-"."B";
            break;
        case '18':
            $time = $regs[1]."-"."C";
            break;
        default:
            $time = $regs[1]."-"."A";
            break;
    }   
}   

$sql = "DELETE FROM `register` WHERE `id`='$rid'";
$result = mysql_query($sql);
$sql = "DELETE FROM `userRegister` WHERE `rid`='$rid'";
$result = mysql_query($sql);

$data=array();

if($cb != "") {
    echo $cb."(";
    echo json_encode($data);
    echo ")";
}
else {
    echo json_encode($data);
}
?>
