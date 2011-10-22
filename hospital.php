<?php
header('Content-type: text/javascript');
require_once('db_conn.php');  // connect DB hellocap_db; you need to change the value of $DB_HOST in file db_conn.php
$cb = $_GET['callback'];
$sql = "select * from `hospital` where `valid` = 1";
$result = mysql_query($sql);
$hospitalList = array();
while($data = mysql_fetch_assoc($result)) {
    $hospital['name'] = $data['name'];
    $hospital['url'] = $data['url'];
    $hospital['id'] = $data['id'];
    array_push($hospitalList,$hospital);
}
if($cb != "") {
    echo $cb."(";
    echo json_encode($hospitalList);
    echo ")";
}
else {
    echo json_encode($hospitalList);
}
?>
