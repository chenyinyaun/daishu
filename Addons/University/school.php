<?php
header("content-type:text/html;charset=utf8");
$mysqli = new mysqli("localhost", "root", "9fbbadff8c", "thinkphp_daishu");
$city = $_POST['city'];
$sql = "SELECT DISTINCT school FROM onethink_university WHERE city='$city' ";
$mysqli -> query("SET NAMES 'utf8'");
$result = $mysqli -> query($sql);
$school = array();
while ($row = $result -> fetch_assoc()) {
	$school[] = $row['school'];
}
echo json_encode($school,JSON_UNESCAPED_UNICODE);
?>
