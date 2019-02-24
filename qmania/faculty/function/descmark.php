<?php
	require '../../function/connection.php';
	 $id='';
    if(isset($_GET['id']))
    {
      $id=$_GET['id'];
    }
	session_start();
	$faculty_id=$_SESSION['id'];
	if($_SESSION['type']=='faculty')
	{
		$descmark=$_GET['descmark'];
		$quizid=$_GET['quizid'];
		$answerid=$_GET['answerid'];
		$userid=$_GET['userid'];
		$sql="UPDATE `answer` SET `status`='completed',`answerdescmark`='$descmark' WHERE answerid=$answerid and userid='$userid'";

		if ($conn->query($sql) === TRUE) {
			//echo $sql;
			$sql1 = "UPDATE `rank` SET `score`=score+$descmark,`status`= 'completed' WHERE `userid`='$userid' AND `quizid`='$quizid'";
			if ($conn->query($sql1) === TRUE) {
		    echo "New record created successfully";
		
		  //  header('Location: ../admin.php');

	} 
		
		  //  header('Location: ../admin.php');

	} 
		$conn->close();
	}
?>
