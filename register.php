<?php
require_once('db_conn.php');  // connect DB hellocap_db; you need to change the value of $DB_HOST in file db_conn.php
header('Content-type: text/javascript');
$hospitalId = $_GET['hospitalId'];
$doctorId = $_GET['doctorId'];
$deptId = $_GET['deptId'];

$hospital = $_GET['hospital'];
$doctor = $_GET['doctor'];
$dept = $_GET['dept'];
$time = $_GET['time'];
$id = $_GET['id'];
$birthday = $_GET['birthday'];
$first = "true";
$message = $_GET['message'];
#
$sql = "select `id` from `user` where `idNumber`='$id' and `birthday`='$birthday'";
$d['ff']=$sql;
$result = mysql_query($sql);
$num_rows = mysql_num_rows($result);
$d['status']=0;
srand(time());
$registerNumber = rand()%100+1;
$d['message']=$registerNumber;
if($num_rows == 1) {
    $row = mysql_fetch_row($result);
    $uid = $row[0];
    $insertSql = "INSERT INTO `register`(`number`, `hospital`, `hospitalId`, `department`, `deptId`, `doctor`, `doctorId`, `time`, `available`) VALUES ('$message','$hospital','$hospitalId','$dept','$deptId','$doctor','$doctorId','$time',1)";
    $d['mm']=$insertSql;
    mysql_query($insertSql);
    $sql = "SELECT `id` FROM `register` order by `id` desc limit 1";
    $row = mysql_fetch_row(mysql_query($sql));
    $rid = $row[0];
    $insertSql = "INSERT INTO `userRegister`(`uid`, `rid`) VALUES ($uid,$rid)";
    $d['dd']=$insertSql;
    mysql_query($insertSql);
    /**
      * Query to register 
      */ 
    //$sql = "SELECT `url` FROM `hospital` where `id`=$hospitalId";
    //$row = mysql_fetch_row(mysql_query($sql));
    //$url = $row[0];
    //$response = file_get_contents ("$url/register?docotr=$doctorId&dept=$deptId&time=$time&id=$id&birthday=$birthday&first=true"); 
    //$d['back_data']=$response;
}
$cb = $_GET['callback'];
if($cb!="") {
    echo $_GET['callback']."(";
    echo json_encode($d);
    echo ")";
}
else {
    echo json_encode($d);
}
?>	
