<?php
	require '../../function/connection.php';
	session_start();
	if($_SESSION['type']=='faculty')
	{
		$id=$_SESSION['id'];
		$quizname=$_POST['quizname'];
	    $description=$_POST['description'];
	    $timer=$_POST['timer'];
		$sql = "INSERT INTO `quiz`(`quizname`, `description`, `timer`,`userid`, `status`)
		VALUES ('$quizname','$description','$timer','$id','De-activated')";

		if ($conn->query($sql) === TRUE) {
			echo ("<SCRIPT LANGUAGE='JavaScript'>
				window.alert('Quiz Created Succesfully!!!.')
				window.location.href='../admin.php';
				</SCRIPT>");

		  $last_id = $conn->insert_id;
		  //  echo "New record created successfully";
		   header('Location: ../addquestion.php?id='.$last_id);
		} else {
			echo ("<SCRIPT LANGUAGE='JavaScript'>
				window.alert('Invalid details!!!.')
				window.location.href='../admin.php';
				</SCRIPT>");
		}

		$conn->close();
	}
?>
