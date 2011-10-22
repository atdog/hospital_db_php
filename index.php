<?php
require_once('db_conn.php');  // connect DB hellocap_db; you need to change the value of $DB_HOST in file db_conn.php
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Hello CAP</title>
</head>
<body>
<?php 
    echo "Hello World.";
	//$sql1 = "INSERT INTO hellocap (`col1`) VALUES ('Hello CAP');"; 
	//mysql_query($sql1);	// insert a new entry to Table 'hellocap' with string "Hello CAP"
	//$sql2 = "SELECT * FROM hellocap;";
	//$result = mysql_query($sql2);
	//$i = 1;
	//while ($data = mysql_fetch_assoc($result)) {  // fetch the entries one-by-one
	//	echo $i.".".$data['col1']."<br />"; // display each entry
	//	$i++;
	//}
?>	
</body>
</html>
