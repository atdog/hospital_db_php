<?php
header('Content-type: text/javascript');
require_once('db_conn.php');  // connect DB hellocap_db; you need to change the value of $DB_HOST in file db_conn.php
$cb = $_GET['callback'];
$idJson = $_GET['idJson'];
$idObj = json_decode($idJson);
$sql = "select * from `schedule` join `register` on `id`=`rid` where `idNumber` = '".$idObj->id[0]."'";
$eventSource = array();
$idNum=count($idObj->id);
for($i=1; $i<$idNum; ++$i) {
    $sql .= " or `idNumber`='".$idObj->id[$i]."'";
}
$sql .= " order by `start`";
$result = mysql_query($sql);
while($data = mysql_fetch_assoc($result)) {
    $time = $data['start'];
    if ( preg_match('/(.*)-([ABC])/',$time,$regs) ) {
        switch ($regs[2]) {
            case 'A':
                $time = $regs[1]." "."09:00";
                break;
            case 'B':
                $time = $regs[1]." "."12:00";
                break;
            case 'C':
                $time = $regs[1]." "."18:00";
                break;
        }
    }
    $event['title'] = $data['title'];
    $event['subtitle'] = $data['subtitle'];
    $event['start']=$time;
    $event['rid'] = $data['rid'];
    $event['idNumber'] = $data['idNumber'];
    $event['hospital'] = $data['hospital'];
    $event['department'] = $data['department'];
    $event['doctor'] = $data['doctor'];
    $event['number'] = $data['number'];

    array_push($eventSource,$event);
}
if($cb != "") {
    echo $_GET['callback']."(";
    echo json_encode($eventSource);
    echo ")";
}
else {
    echo json_encode($eventSource);
}
?>  
