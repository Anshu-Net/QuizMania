<?php
	require '../../function/connection.php';
	session_start();
	if($_SESSION['type']=='faculty')
		{
			$id=$_GET['userid'];
			$quizid=$_GET['quizid'];
			$sql="DELETE FROM `rank` WHERE `quizid` = '$quizid' AND `userid` = '$id'";
			if ($conn->query($sql) === TRUE) {
				$sql2 = "DELETE FROM `answer` WHERE `quesid` IN ( SELECT quesid FROM questions WHERE quizid = '$quizid' AND userid ='$id')";
				if ($conn->query($sql2) === TRUE) {

		   // echo "New record created successfully";
		   header('Location:../result.php?id='.$_GET['quizid'].'');
					}
				} 
			else
				{
				    echo "Error: " . $sql . "<br>" . $conn->error;
				}
		}
		

?>