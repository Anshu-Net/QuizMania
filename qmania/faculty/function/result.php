<?php
	require '../function/connection.php';
	session_start();
	if($_SESSION['type']=='faculty')
		{
			$id=$_GET['id'];
			$sql="SELECT * FROM `rank` WHERE quizid='$id'";
			$result=$conn->query($sql);
		}
		return $result;

?>