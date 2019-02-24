<?php
	require '../../function/connection.php';
	session_start();
	if($_SESSION['type']=='faculty')
		{
			$quizid=$_GET['quizid'];
			$sql = "SELECT `userid`,`score` FROM `rank` WHERE `quizid` = '$quizid'";
			$setRec =$conn->query($sql);
		
   
			$columnHeader = '';  
			$columnHeader = "Student USN" . "\t" . "Marks" . "\t";  
			$setData = '';  
			  while ($rec = mysqli_fetch_row($setRec)) {  
			    $rowData = '';  
			    foreach ($rec as $value) {  
			        $value = '"' . $value . '"' . "\t";  
			        $rowData .= $value;  
			    }  
			    $setData .= trim($rowData) . "\n";  
			}  
			
			$sql1="SELECT `quizname` FROM `quiz` where `quizid`='$quizid'";
			$result1=$conn->query($sql1);
			$row=$result1->fetch_assoc();
			$qname=$row['quizname'];  
			header("Content-type: application/octet-stream");  
			header("Content-Disposition: attachment; filename=$qname.xls");  
			header("Pragma: no-cache");  
			header("Expires: 0");  

			  echo ucwords($columnHeader) . "\n" . $setData . "\n";  
		}
 ?> 
