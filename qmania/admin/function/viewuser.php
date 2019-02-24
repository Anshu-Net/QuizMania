<?php
	session_start();
	function view_user($type,$conn)
	{
		if($_SESSION['type']=='admin')
		{
			$sql="SELECT * FROM `users` WHERE type='$type'";
			$result=$conn->query($sql);
		}
		return $result;
	}

	function StudentFilter($batch)
	{
			require '../function/connection.php';
			$sql="SELECT * FROM `users` WHERE `batch` LIKE '%$batch%'";
			$result=$conn->query($sql);
			return $result;
	}
?>