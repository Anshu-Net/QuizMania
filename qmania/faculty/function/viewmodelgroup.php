<?php
	session_start();
	function viewModelGroups()
	{
		$faculty_id=$_SESSION['id'];
		$result;
		if($_SESSION['type']=='faculty')
		{
			require '../function/connection.php';
			$sql="SELECT * FROM `group` WHERE `userid`='$faculty_id' AND status = 'activated'";
			$result=$conn->query($sql);
			return $result;
		}

	}
?>
