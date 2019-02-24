<?php

	$result='';
	$keyword=$_POST['keyword'];
	require '../../function/connection.php';
	$sql= "select * from quiz WHERE quizname LIKE '%$keyword%'";
	$result=$conn->query($sql);
	$num=mysqli_num_rows($result);
	
?>
