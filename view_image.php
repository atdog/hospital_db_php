<?
//檢視資料庫中的圖檔
include_once("./db_conn.php");

$id = $_GET['id'];

$result = "SELECT * FROM `image` WHERE `idNumber`='$id' order by `uid` desc limit 1";
$sql = mysql_query($result);

if(mysql_num_rows($sql)==0) {
    $result = "SELECT * FROM `image` WHERE `uid`=1";
    $sql = mysql_query($result);
}
$row = mysql_fetch_row($sql);

//echo $result;
//var_dump($row);
$itype = $row[2];
// 根據檔案類型宣告 Header
if ($itype == 'jpg' or $itype == 'jpeg' ) header("Content-type: image/jpeg");
if ($itype == 'gif') header("Content-type: image/gif");
if ($itype == 'png') header("Content-type: image/png");

$show_photo = $row[1];

// 輸出圖檔
echo $show_photo;
?>
