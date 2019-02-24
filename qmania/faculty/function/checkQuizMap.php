<?php
	function check_quiz($quiz_id , $group_id)
	{
		require '../function/connection.php';
		$sql="SELECT * FROM `quizmap` where `group_id`='$group_id' AND `quiz_id`= '$quiz_id'";
		$result=$conn->query($sql);
		//echo $sql;
		return $result->num_rows;
	}
	//echo check_quiz(5,10);
?>