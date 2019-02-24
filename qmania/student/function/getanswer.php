<?php
	require '../../function/connection.php';
	session_start();
	if($_SESSION['type']=='student')
	{
		$quesid=$_GET['quesid'];
		$optid=$_GET['optid'];
		$sql ="SELECT `mark` FROM `questions` WHERE `quesid`= '$quesid' AND `correctans_id`= '$optid'";
		$result=$conn->query($sql);
		if (mysqli_num_rows($result) > 0) {
    // output data of each row
    	while($row = mysqli_fetch_assoc($result)) {
        echo $row["mark"];
    	}
    }

	else
		{
		    echo 0;
		}
		$conn->close();
	}
?>
