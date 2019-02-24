<?php
	require '../../function/connection.php';
	session_start();
	if($_SESSION['type']=='admin')
	{
		$start_year=$_POST['start_year'];
		$end_year=$_POST['end_year'];
		$batch=$start_year."-".$end_year;
		$sql = "INSERT INTO `batch`(`batchname`) VALUES ('$batch')";

		if ($conn->query($sql) === TRUE) {
			echo ("<SCRIPT LANGUAGE='JavaScript'>
				window.alert('Batch Added Succesfully!!!.')
				window.location.href='../addbatch.php';
				</SCRIPT>");

		  //  echo "New record created successfully";
		  //  header('Location: ../admin.php');
	} 
	else
		{
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}
		$conn->close();
	}
?>
