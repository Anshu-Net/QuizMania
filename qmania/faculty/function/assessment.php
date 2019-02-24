<?php
	require '../function/connection.php';
	session_start();
	if($_SESSION['type']=='faculty')
		{
			$id=$_GET['id'];
			$sql = "SELECT `quesid`,`question`,`mark` FROM `questions` WHERE `quizid`='$id' AND `questype`='descriptive'";
			$result=$conn->query($sql);
			// if (mysqli_num_rows($result) > 0) {
			// 	while($row = mysqli_fetch_assoc($result)) {
			// 		// $row=$result->fetch_assoc();
			// 		echo $row["quesid"];
			//       	echo $row["question"];
			//       	echo $row["mark"];
			// 		$quesid=$row["quesid"];
			// 		$sql1= "SELECT * FROM `answer` WHERE `quesid`= $quesid";
			// 		$result1=$conn->query($sql1);
			// 		if (mysqli_num_rows($result1) > 0) {
			// 			while($row2 = mysqli_fetch_assoc($result1)) {
			// 			  echo $row2['userid'];
			// 			 echo $row2['answerdesc'];
			// 					} 
			// 	}
			// }

		// }
		
	}
?>