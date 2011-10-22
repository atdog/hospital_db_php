<?php
header('Content-type: text/javascript');
require_once('db_conn.php');  // connect DB hellocap_db; you need to change the value of $DB_HOST in file db_conn.php
$cb = $_GET['callback'];
$rid = $_GET['rid'];
$sql = "select * from (select * from (select * from `register` where `id` = '$rid') registerIns join `userRegister` on `userRegister`.`rid`=`registerIns`.`id`) tmp join `user` on `user`.`id` = `tmp`.`uid`";
$result = mysql_query($sql);
$row = mysql_fetch_object($result);

$registerData['hospital'] = $row->hospital;
$registerData['hospitalId'] = $row->hospitalId;
$registerData['dept'] = $row->department;
$registerData['deptId'] = $row->deptId;
$registerData['doctor'] = $row->doctor;
$registerData['doctorId'] = $row->doctorId;
$registerData['idNumber'] = $row->idNumber;
$registerData['birthday'] = $row->birthday;
$time = $row->time;
$registerData['realTime'] = $row->time;

if ( preg_match('/(.*)-([ABC])/',$time,$regs) ) {                                                                                                                   
    switch ($regs[2]) {
        case 'A':
            $time = $regs[1]." "."09:00:00";
            break;
        case 'B':
            $time = $regs[1]." "."12:00:00";
            break;
        case 'C':
            $time = $regs[1]." "."18:00:00";
            break;
    }   
}   
$registerData['time'] = $time;
$registerData['number'] = $row->number;
$registerData['rid'] = $rid;

$sql = "select * from hospital where id = $row->hospitalId";
$result = mysql_query($sql);
$row = mysql_fetch_object($result);
$registerData['hospitalURL'] = $row->url;
if($cb != "") {
    echo $cb."(";
    echo json_encode($registerData);
    echo ")";
}
else {
    echo json_encode($registerData);
}
?>
