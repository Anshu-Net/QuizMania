<?php
	require '../../function/connection.php';
	session_start();
	if($_SESSION['type']=='admin')
	{
		$id=$_GET['id'];
		$status=$_GET['status'];
		$sql = "UPDATE `users` SET `status`='$status' WHERE userid='$id'";

		if ($conn->query($sql) === TRUE) {
		    echo "New record created successfully";
				if($_GET['type']==='student'){
					header('Location: ../studentlist.php');
				}
				else {
					header('Location: ../facultylist.php');
				}

		} else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}

		$conn->close();
	}



?>
