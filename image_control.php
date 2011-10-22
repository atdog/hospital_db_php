<?
//phpinfo();
//將檔案匯入到 mysql 資料庫中
require_once("./db_conn.php");
// 將圖檔匯入資料庫內 $fd = fopen($_FILES['file']['tmp_name'], "rb");
// 取得檔案類型
$blob = $_POST['blob'];
$itype = $_POST['itype'];
$idNumber = $_POST['idNumber'];

$str="INSERT INTO image (matter , itype , idNumber) VALUES(" . $blob . ", '" . $itype . "' , '".$idNumber."')";
$result = mysql_query($str);
if (!$result) die("執行 SQL 命令失敗");
?>


