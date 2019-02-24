<?php
	require '../../function/connection.php';
	session_start();
	if($_SESSION['type']=='admin')
	{
		$id=$_GET['id'];
		$status=$_GET['status'];
    $batchname=$_GET['batchname'];
		$sql = "UPDATE `batch` SET `status`='$status' WHERE batchid='$id'";

		if ($conn->query($sql) === TRUE) {
		    echo "New record created successfully";
		    header('Location: ../addbatch.php');
		} else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}

		$conn->close();
	}

?>
