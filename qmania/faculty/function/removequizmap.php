<?php
	require '../../function/connection.php';
	session_start();
	if($_SESSION['type']=='faculty')
	{	
		if (isset($_GET['quiz_id'])) {
			echo "HEllo";
			$quiz_id=$_GET['quiz_id'];
			$group_id=$_GET['group_id'];
			$sql = "DELETE FROM `quizmap` WHERE `quiz_id`='$quiz_id' AND `group_id`='$group_id'";
			if ($conn->query($sql) === TRUE) {
				echo "true";
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