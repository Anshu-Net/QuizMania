<?php
	$faculty_id=$_SESSION['id'];
	$result='';
	require '../function/connection.php';
	$sql = "SELECT * FROM `group` WHERE `userid`='$faculty_id' AND `status`='activated'";
	$result_group=$conn->query($sql);
?>
