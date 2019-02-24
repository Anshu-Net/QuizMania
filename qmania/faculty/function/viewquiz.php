<?php
	session_start();
	function viewQuiz()
	{
		$faculty_id=$_SESSION['id'];
		$result;
		if($_SESSION['type']=='faculty')
		{
			require '../function/connection.php';
			$sql="SELECT * FROM `quiz` WHERE `userid`='$faculty_id'";
			$result=$conn->query($sql);
			return $result;
		}
		
	}
	function viewQuizFilter($keyword)
	{
		$faculty_id=$_SESSION['id'];
		$result;
		if($_SESSION['type']=='faculty')
		{
			require '../function/connection.php';
			$sql="SELECT * FROM `quiz` WHERE `userid`='$faculty_id' AND quizname LIKE '%$keyword%'";
			$result=$conn->query($sql);
			return $result;
		}
		
	}
?>