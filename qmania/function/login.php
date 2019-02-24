<?php
	require 'connection.php';
	session_start();
	$username=$_POST['username'];
	$password=$_POST['password'];
	$sql = "SELECT `userid`, `fname`, `lname`,`type` FROM `users` WHERE userid='$username' AND password='$password' AND status='activated'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		$row = $result->fetch_assoc();
		if($row['type']=='admin')
		{
			$_SESSION['id']=$row['userid'];
			$_SESSION['fname']=$row['fname'];
			$_SESSION['type']=$row['type'];
			header('Location: ../admin/admin.php');
		}
		elseif($row['type']=='student')
		{
			$_SESSION['id']=$row['userid'];
			$_SESSION['fname']=$row['fname'];
			$_SESSION['type']=$row['type'];
			header('Location: ../student/student.php');
		}
		elseif($row['type']=='faculty')
		{
			$_SESSION['id']=$row['userid'];
			$_SESSION['fname']=$row['fname'];
			$_SESSION['lname']=$row['lname'];
			$_SESSION['type']=$row['type'];
			header('Location: ../faculty/faculty.php');
		}
		else
		{
			header('Location: ../login.php?error="Invalid Credentials"');
		}
	}
	else
	{
		//echo "Error: " . $sql . "<br>" . $conn->error;
		echo ("<SCRIPT LANGUAGE='JavaScript'>
			window.alert('Invalid Credentials!!!')
			window.location.href='../login.php';
			</SCRIPT>");
	}
?>
