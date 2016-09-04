<?php
header("content-type:text/html;charset=utf8");
$mysqli = new mysqli("localhost", "root", "9fbbadff8c", "thinkphp_daishu");
$school = $_POST['school'];
$sql = "SELECT DISTINCT academy FROM onethink_university WHERE school='$school' ";
$mysqli -> query("SET NAMES 'utf8'");
$result = $mysqli -> query($sql);
$academy = array();
while ($row = $result -> fetch_assoc()) {
	$academy[] = $row['academy'];
}
echo json_encode($academy,JSON_UNESCAPED_UNICODE);
?>
