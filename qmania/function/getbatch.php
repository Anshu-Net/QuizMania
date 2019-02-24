<?php

	$result='';
	require '../function/connection.php';
	$sql="select batchname from batch WHERE status='activated'";	
	$result=$conn->query($sql);
?>
