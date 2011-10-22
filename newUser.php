<?php
require_once('db_conn.php');  // connect DB hellocap_db; you need to change the value of $DB_HOST in file db_conn.php
$cb = $_GET['callback'];
$id = $_GET['id'];
$birthday = $_GET['birthday'];
$sql = "INSERT INTO `user`(`idNumber`, `birthday`) VALUES ('$id','$birthday')";
mysql_query($sql);

$d = array();
if($cb != "") {                                                                                                                                                         
    echo $cb."(";
    echo json_encode($d);
    echo ")";
}
else {
    echo json_encode($d);
}
?>
