<?php
	require '../../function/connection.php';
	session_start();
		$student_id=$_SESSION['id'];
		$quizid=$_GET['quizid'];
		$score=$_GET['marks'];
		echo $student_id;
		echo $quizid;
		echo $score;
		$status='';
		$sql1 = "SELECT * FROM `questions` WHERE `questype`='descriptive' AND `quizid`='$quizid'";
		$result=$conn->query($sql1);
		echo mysqli_num_rows($result);
		if (mysqli_num_rows($result) > 0) {
			$status='pending';
		}
		else
		{
			$status='completed';
		}
		$sql="INSERT INTO `rank`(`userid`, `quizid`, `score`, `status`) VALUES ('$student_id','$quizid','$score','$status')";
		if ($conn->query($sql) === TRUE) {

		  //  echo "New record created successfully";
		  //  header('Location: ../admin.php');
	} 
	
		$conn->close();
?>
