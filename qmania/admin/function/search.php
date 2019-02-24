<?php

	function StudentFilter($batch)
	{
	
			require '../function/connection.php';
			$sql="SELECT * FROM `users` WHERE `batch` LIKE '%$batch%'";
			$result=$conn->query($sql);
			return $result;
		
	}
	?>