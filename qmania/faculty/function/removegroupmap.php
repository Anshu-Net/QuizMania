<?php
	require '../../function/connection.php';
	session_start();
	if($_SESSION['type']=='faculty')
	{	
		if (isset($_GET['student_id'])){
			$student_id=$_GET['student_id'];
			$group_id=$_GET['group_id'];
			$sql = "DELETE FROM `groupmap` WHERE `groupid`='$group_id' AND `userid`='$student_id'";
			if ($conn->query($sql) === TRUE) {
				echo 'true';
			} else {
				echo "Error deleting record: " . $conn->error;
			}
			
		}
		else
		{
			$conn->error;
		}
	}

?>