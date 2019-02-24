<?php
	session_start();
	function view_batch($type,$conn)
	{
		if($_SESSION['type']=='admin')
		{
			$sql="SELECT * FROM `batch`";
			$result=$conn->query($sql);
		}
		return $result;
	}

?>
