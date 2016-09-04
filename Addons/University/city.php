<?php
header("content-type:text/html;charset=utf8");
$mysqli = new mysqli("localhost", "root", "9fbbadff8c", "thinkphp_daishu");
$province = $_POST['province'];
$sql = "SELECT DISTINCT city FROM onethink_university WHERE province='$province' ";
$mysqli -> query("SET NAMES 'utf8'");
$result = $mysqli -> query($sql);
$city = array();
while ($row = $result -> fetch_assoc()) {
	$city[] = $row['city'];
}
echo json_encode($city,JSON_UNESCAPED_UNICODE);
?>
