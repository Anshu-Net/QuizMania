<?php
	require '../../function/connection.php';
	session_start();
	if($_SESSION['type']=='faculty')
	{
		if (isset($_GET['quiz_id'])) {
			$quiz_id=$_GET['quiz_id'];
			$group_id=$_GET['group_id'];
			$sql = "INSERT INTO `quizmap`(`quiz_id`, `group_id`) VALUES ('$quiz_id','$group_id')";
			if ($conn->query($sql) === TRUE) {
				echo 'true';
			}
			else
			{
				echo $conn->error;
			}
		}
	}

?>