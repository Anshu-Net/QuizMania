<?php
	session_start();
	function view_user($type,$batch,$conn)
	{
		if($_SESSION['type']=='faculty')
		{
			$sql="SELECT * FROM `users` WHERE type='$type' AND batch='$batch' AND status= 'activated'";
			$result=$conn->query($sql);
		}
		return $result;
	}

?>
