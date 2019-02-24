<?php
	require '../../function/connection.php';
	session_start();
	if($_SESSION['type']=='admin')
	{
		$id=$_GET['id'];
		$password=$_GET['password'];
		$sql = "UPDATE `users` SET `password`='$password' WHERE userid='$id'";

		if ($conn->query($sql) === TRUE) {
		    echo ("<SCRIPT LANGUAGE='JavaScript'>
				window.alert('Reset password Succesfully!!!.')
				window.location.href='../admin.php';
				</SCRIPT>");

		} else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}

		$conn->close();
	}



?>
