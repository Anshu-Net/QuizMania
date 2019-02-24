<?php
	require '../../function/connection.php';
	session_start();
	echo $_SESSION['type'];
	if($_SESSION['type']=='faculty')
	{
		$groupname=$_POST['groupname'];
    	$batch=$_POST['batch'];
    	$userid=$_SESSION['id'];
		$sql = "INSERT INTO `group`(`groupname`, `userid`, `batch`)
		VALUES ('$groupname','$userid','$batch')";

		if ($conn->query($sql) === TRUE) {
			echo ("<SCRIPT LANGUAGE='JavaScript'>
				window.alert('Group Created Succesfully!!!.')
				window.location.href='../admin.php';
				</SCRIPT>");
			$last_id = $conn->insert_id;
		  //  echo "New record created successfully";
		   header('Location: ../addstudent.php?id='.$last_id.'&batch='.$batch);
		} else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}

		$conn->close();
	}
	else
	{

		echo "Login First";
	}
?>
