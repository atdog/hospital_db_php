<?php
  $DB_HOST        = "dbhome.cs.nctu.edu.tw"; // you need to replace the "localhost" with "<IP>:<Port>" which ECAP assigned 		
  $DB_USER        = "hcsu_cs";           
  $DB_PASSWORD    = "ji394w96ao4";         
  $DB_NAME        = "hcsu_cs_hospital";       

  $conn = mysql_connect($DB_HOST, $DB_USER, $DB_PASSWORD);
  if (!$conn) {
	echo mysql_error($conn)."<br />";
	return;
  }
  if (!mysql_select_db($DB_NAME)) {
	echo mysql_error($conn)."<br />";
	return;
  }
  mysql_set_charset('utf8', $conn);
?>
