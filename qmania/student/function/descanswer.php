<?php
	require '../../function/connection.php';
	 $id='';
    if(isset($_GET['id']))
    {
      $id=$_GET['id'];
    }
	session_start();
	$student_id=$_SESSION['id'];
	if($_SESSION['type']=='student')
	{
		$quesid=$_GET['quesid'];
		$answer=$_GET['answer'];
		$sql="INSERT INTO `answer`(`answerdesc`, `status`, `quesid`, `userid`) VALUES ('$answer','pending','$quesid','$student_id')";

		if ($conn->query($sql) === TRUE) {
			//echo $sql;

		    echo "New record created successfully";
		  //  header('Location: ../admin.php');
	} 
		$conn->close();
	}
?>
