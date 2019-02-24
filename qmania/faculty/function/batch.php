<?php
	require '../../function/connection.php';
	session_start();
	if($_SESSION['type']=='faculty')
		{
			// $id=$_GET['id'];
			$batch=$_POST['batch'];
			$sql = "SELECT * FROM `users` WHERE batch = '$batch'";
			echo $sql;
			}
?>