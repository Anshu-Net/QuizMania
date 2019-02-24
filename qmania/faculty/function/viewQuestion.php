<?php
    require "../function/connection.php";
    function viewQuestions($quiz_id)
	{
		$result;
		if($_SESSION['type']=='faculty')
		{
			require '../function/connection.php';
			$sql="SELECT * FROM `quiestions` WHERE quesid='$quiz_id'";
			$result=$conn->query($sql);
			return $result;
		}
		
	}
?>