<?php
	//require '../../function/connection.php';
	function check_group($student_id , $group_id,$conn)
	{
		$sql="SELECT * FROM `groupmap`  where `groupid`='$group_id' AND `userid`= '$student_id'";
		$result=$conn->query($sql);
		return $result->num_rows;
	}
	//echo check_group("01FM15CCA022",12,$conn);
?>