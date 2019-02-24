<?php
	require '../../function/connection.php';
	session_start();
	if($_SESSION['type']=='faculty')
	{
		$id=$_GET['id'];
		$status=$_GET['status'];
		$sql = "UPDATE `group` SET `status`='$status' WHERE groupid='$id'";

		if ($conn->query($sql) === TRUE) {
		    echo "New record created successfully";
		    header('Location: ../managegroup.php');
		} else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}

		$conn->close();
	}



?>