<?php
	require '../../function/connection.php';
	session_start();
	$faculty_id=$_SESSION['id'];
	if (isset($_POST['type'])) {
		if ($_POST['type']=='1') {
			$quiz_id=$_POST['id'];
			$question=$_POST['question'];
			$opt1=$_POST['opt1'];
			$opt2=$_POST['opt2'];
			$opt3=$_POST['opt3'];
			$opt4=$_POST['opt4'];
			$correct_answer='';
			$type="multiplechoice";

			$mark=$_POST['mark'];

			$sql="INSERT INTO `questions`(`question`, `questype`, `mark`, `quizid`, `user_id`) VALUES ('$question','$type','$mark','$quiz_id','$faculty_id')";
			if ($conn->query($sql) === TRUE) {
				 //header('Location: ../addquestion.php?id='.$quiz_id);
				$last_id = $conn->insert_id;
				 if($_POST['optradio'] == 'opt1')
				{
					$correct_answer=$opt1;
					addoption($conn,$opt1,$quiz_id,1,$last_id);
				}
				else
				{
					addoption($conn,$opt1,$quiz_id,0,$last_id);
				}
				if($_POST['optradio'] == 'opt2')
				{
					addoption($conn,$opt2,$quiz_id,1,$last_id);
				}
				else
				{
					addoption($conn,$opt2,$quiz_id,0,$last_id);
				}
				if ($_POST['optradio'] == 'opt3')
				{
					addoption($conn,$opt3,$quiz_id,1,$last_id);
				}
				else
				{
					addoption($conn,$opt3,$quiz_id,0,$last_id);
				}
				if($_POST['optradio'] == 'opt4')
				{
					addoption($conn,$opt3,$quiz_id,1,$last_id);
				}
				else
				{
					addoption($conn,$opt4,$quiz_id,0,$last_id);
				}
			}
			else
			{
				echo $conn->error;
			}
		}
		else if ($_POST['type']=='2') {
			$quiz_id=$_POST['id'];
			$question=$_POST['question'];
			$mark=$_POST['mark'];
			$type="descriptive";
			$sql="INSERT INTO `questions`(`question`, `questype`, `mark`, `quizid`, `user_id`) VALUES ('$question','$type','$mark','$quiz_id','$faculty_id')";
			if ($conn->query($sql) === TRUE) {
				 header('Location: ../addquestion.php?adg=true&id='.$quiz_id);
			}
		}
		elseif ($_POST['type']=='3') {
			$quiz_id=$_POST['id'];
			$question=$_POST['question'];
			$correct_answer=$_POST['optradio'];
			$mark=$_POST['mark'];
			$type="truefalse";
			$sql="INSERT INTO `questions`(`question`, `questype`, `mark`, `quizid`, `user_id`) VALUES ('$question','$type','$mark','$quiz_id','$faculty_id')";
			if ($conn->query($sql) === TRUE) {
				$last_id = $conn->insert_id;
				addoption($conn,$correct_answer,$quiz_id,1,$last_id);
			}
		}
	}
	function addoption($conn,$option,$quiz_id,$isCorrect,$ques_id){
		$sql="INSERT INTO `option`(`options`, `quesid`) VALUES ('$option','$ques_id')";
		if ($conn->query($sql)) {
			if($isCorrect == 1)
			{
				$last_id = $conn->insert_id;
				addcorrectoption($conn,$quiz_id,$ques_id,$last_id);
			}
		}
		else
		{
			echo $conn->error;
		}
	};
	function addcorrectoption($conn,$quiz_id,$ques_id,$correct_id){
		echo $ques_id;
		$sql="UPDATE `questions` SET `correctans_id`='$correct_id' WHERE quesid=$ques_id";
		if ($conn->query($sql)) {
			header('Location: ../addquestion.php?adg=true&id='.$quiz_id);
			echo "Success";
		}
		else
		{
			echo $conn->error;
		}
	};
?>
