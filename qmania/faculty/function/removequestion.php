<?php
	require '../../function/connection.php';
	$id=$_GET['id'];
	$quesid=$_GET['quizid'];
	$type=$_GET['type'];

	if ($_GET['type'] == 'descriptive') 
	{
		$sql="DELETE FROM `questions` WHERE `quesid`=$id";
		$sql2="DELETE FROM `answer` WHERE `quesid`=$id";
		if($conn->query($sql2) === true)
		{
			if($conn->query($sql) === true)
			{
			header('Location:../addquestion.php?id='.$quesid.'');
			}
		}
	}
	else
	{
	$sql1="DELETE FROM `questions` WHERE `quesid`=$id";
	$sql2="DELETE FROM `option` WHERE `quesid`=$id";
	if($conn->query($sql2) === true)
	{
		if($conn->query($sql1) === true)
		{
			header('Location:../addquestion.php?id='.$quesid.'');
		}
	}
	}
	// else
	// {
	// 	echo $conn->error;

	// }
?>