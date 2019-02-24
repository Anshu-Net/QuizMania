<?php
	require '../../function/connection.php';
	session_start();
	if($_SESSION['type']=='admin')
	{
		$uname=$_POST['uname'];
		$first_name=$_POST['first_name'];
		$last_name=$_POST['last_name'];
		$email=$_POST['email'];
		$gender=$_POST['gender'];
		$password=$_POST['password'];
		$sql = "INSERT INTO `users`(`userid`, `fname`, `lname`, `password`, `gender`, `email`,`type`)
		VALUES ('$uname','$first_name','$last_name','$password','$gender','$email','faculty')";

		if ($conn->query($sql) === TRUE) {
			echo ("<SCRIPT LANGUAGE='JavaScript'>
				window.alert('Faculty Added Succesfully!!!')
				window.location.href='../admin.php';
				</SCRIPT>");

		  //  echo "New record created successfully";
		  //  header('Location: ../admin.php');
		} else {
		   // echo "Error: " . $sql . "<br>" . $conn->error;
				echo ("<SCRIPT LANGUAGE='JavaScript'>
					window.alert('Invalid details!!!')
					window.location.href='../addfaculty.php';
					</SCRIPT>");
		}

		$conn->close();
	}
?>
