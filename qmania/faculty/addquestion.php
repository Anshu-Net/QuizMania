<?php
	$id='';
	$adg='false';
	if(isset($_GET['id']))
	{
		$id=$_GET['id'];
	}
	if (isset($_GET['adg'])) {
		$adg=true;
	}
	else
	{
		// header('')
	}

	require 'function/viewmodelgroup.php';
	require 'function/checkQuizMap.php';
	require '../function/connection.php';
	function viewQuestions($id,$conn){
		$sql="SELECT * FROM `questions` WHERE quizid='$id'";
					$result=$conn->query($sql);
					return $result;
	}
	$sql="SELECT `quizname` FROM `quiz` where `quizid`='$id'";
	$result=$conn->query($sql);
	$row=$result->fetch_assoc();
	$qname=$row['quizname'];

	  $sql2="SELECT SUM(`mark`) as `total` FROM `questions` WHERE `quizid`='$id'";
    $result2=$conn->query($sql2);
    // $row2 = mysql_fetch_assoc($result2); 
    $row2=$result2->fetch_assoc();
    $sum=$row2['total'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>QuizMania|Faculty</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <link rel="stylesheet" type="text/css" href="faculty.css">
    <script type="text/javascript">
		$( document ).ready(function() {
var adg=<?php echo $adg;?>;
			if( adg == false)
			{$('#group').modal('show');}
			$('.add').click(function(){
				var group_id = $(this).val();
			var quiz_id = '<?php echo $id ?>';
							console.log(quiz_id);
							console.log(group_id);
							$.get("function/addquizmap.php",{ quiz_id:quiz_id, group_id:group_id  } ,function(data, status){
							//alert("Data: " + data + "\nStatus: " + status);
							if(data==='true')
							{
							console.log("Data: " + data + "\nStatus: " + status);
								//$(this).hide();

							}
							else{
								console.log("Data: " + data + "\nStatus: " + status);
							}
					});
					// $(this).text("Remove");
					// $(this).attr("class","btn btn-success remove");

					location.reload();
				});


		$('.remove').click(function(){
			var group_id = $(this).val();
			var quiz_id = '<?php echo $id ?>';
							console.log(quiz_id);
							console.log(group_id);
			$.get("function/removequizmap.php",{ quiz_id:quiz_id, group_id:group_id } ,function(data, status){
					console.log("Data: " + data + "\nStatus: " + status);
					if(data==='true')
					{
						//alert("Data: " + data + "\nStatus: " + status);
						//$(this).text("Add");
						// $(this).text("Add");
						// $(this).attr("class","btn btn-success add");


					}
					location.reload();
			});

		});
    		$("#multipleChoice").hide();
    		$("#trueFalse").hide();
    		$("#descriptive").hide();
    		$("#type_selector").change(function(){
		        var selectedName = $('#type_selector').find(":selected").text();
		        if (selectedName == 'Multiple Choice') {
		        	$("#trueFalse").hide();
		        	$("#descriptive").hide();
		        	$("#multipleChoice").show();
		        }
		        else if(selectedName == 'Descriptive')
		        {
		        	$("#multipleChoice").hide();
		        	$("#trueFalse").hide();
		        	$("#descriptive").show();
		        }
		        else if(selectedName == 'True/False')
		        {
		        	$("#multipleChoice").hide();
		        	$("#descriptive").hide();
		        	$("#trueFalse").show();
		        }
		    });
});

    </script>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">QuizMania|Faculty</a>
    </div>
    <ul class="nav navbar-nav">
      <li class=""><a href="faculty.php">Home</a></li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Groups <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="creategroup.php">Create Group</a></li>
          <li><a href="managegroup.php">Manage Group</a></li>
        </ul>
      </li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Quiz<span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="createquiz.php">Create Quiz</a></li>
          <li><a href="quizlist.php">Quiz List</a></li>
        </ul>
      </li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Report<span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="report.php">Assessment</a></li>
          <li><a href="batchreport.php">Batch Report</a></li>
        </ul>
      </li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="../function/logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
    </ul>
  </div>
</nav>

<div class="container">
  <h2><?php echo $qname." -Marks:" .$sum ?></h2>
  <div class="well well-sm">
  <h3>Add Questions</h3>
  <label for="quizname">Select Question Type:</label>
  <select name="Batch" id="type_selector" class="form-control">
    <option selected="true" disabled value="">Question Types:</option>
    <option value="mc">Multiple Choice</option>
    <option value="dcp">Descriptive</option>
    <option value="tf">True/False</option>
  </select>


  	<div id="multipleChoice">
  		<form id="question_form" method="POST" action="function/addquestion.php">
			<label for="question">Question:</label>
		  	<textarea class="form-control" name="question" rows="2" id="comment" required></textarea>
		  	<div class="col-xs-2"><label for="marks">Marks:</label>
		  	<input type="number" name="mark" class="form-control" id="marks" required>
		  	</div><hr>
		  	<br><label for="option">Option 1:</label>
		    <label><input type="radio" value="opt1" name="optradio">correct answer</label>
		  	<input type="text" class="form-control" name="opt1">
		  	<label for="option">Option 2:</label>
		    <label><input type="radio" value="opt2" name="optradio">correct answer</label>
		  	<input type="text" class="form-control" name="opt2">
		  	<label for="radio">Option 3:</label>
		    <label><input type="radio" value="opt3" name="optradio">correct answer</label>
		  	<input type="text" class="form-control" name="opt3">
		  	<label for="option">Option 4:</label>
		    <label><input type="radio" value="opt4" name="optradio">correct answer</label>
		  	<input type="text" class="form-control" name="opt4">
		  	<input type="hidden" name="type" value="1">
		  	<input type="hidden" name="id" value=<?php echo $id; ?>>
		  	<br><button type="submit" class="btn btn-success">Add</button><br>
	 	</form>
	</div>


	<div id="descriptive">
		<form id="question_form" method="POST" action="function/addquestion.php">
			<label for="question">Question:</label>
			<textarea class="form-control" name="question" rows="2" id="comment"></textarea>
			<div class="col-xs-2"><label for="marks">Marks:</label>
		  	<input type="number" name="mark" class="form-control" id="marks" required></div><hr>
			<input type="hidden" name="type" value="2">
			<br><input type="hidden" name="id" value=<?php echo $id; ?>
			<br><button type="submit" class="btn btn-success">Add</button>
		</form>
	</div>


	<div id="trueFalse">
		<form id="question_form" method="POST" action="function/addquestion.php">
			<label for="question">Question:</label>
			<textarea class="form-control" name="question" rows="2" id="comment"></textarea>
		  	<div class="col-xs-2"><label for="marks">Marks:</label>
		  	<input type="number" name="mark" class="form-control" id="marks" required></div><hr>
		  	<br><label for="option">True:</label>
		  	<label><input type="radio" value="true" name="optradio">correct answer</label><br>
		  	<label for="option">False:</label>
		   	<label><input type="radio" value="false" name="optradio">correct answer</label>
		   	<input type="hidden" name="type" value="3">
		   	<input type="hidden" name="id" value=<?php echo $id; ?>>
		    <br><button type="submit" class="btn btn-success">Add</button>
		</form>
	</div>

</div>
<h2>Question List</h2>
<table class="table table-hover">
  <thead>
    <tr>
      <th>Question</th>
      <th>Question Type</th>
      <th>Mark</th>

    </tr>
  </thead>
  <tbody>
<?php			$result=viewQuestions($id,$conn);
        	while($row=$result->fetch_assoc())
       		{
       			echo "<tr>";
		        echo "<td>".$row['question']."</td>";
		         echo "<td>".$row['questype']."</td>";
		          echo "<td>".$row['mark']."</td>";
		          echo "<td><a class='btn btn-danger' href='function/removequestion.php?quizid=".$id."&&id=".$row["quesid"]."&&type=".$row["questype"]."'>Remove</a></td>";
						echo "</tr>"; 
					 }
        ?>
  </tbody>
</table>
</div>
<div id="group" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Select Groups</h4>
      </div>
      <div class="modal-body">
        <table class="table">
        	<tr>
        		<th>Group Name</th>
        		<th>Batch</th>
        	</tr>
        <?php

        	$result=viewModelGroups();
        	while($row=$result->fetch_assoc())
       		{
       			echo "<tr>";
		        echo "<td>".$row['groupname']."</td>";
		        echo "<td>".$row['batch']."</td>";
						echo "<td>";
						//echo check_quiz($row['groupid'],$id);
		        if(check_quiz($id,$row['groupid'])){
							echo "<button id='remove'  class='btn btn-success remove' value='".$row['groupid']."'><span id='btn_text'>Remove</span></button>";
						}
						else
						{
							echo "<button id='add' class='btn btn-success add'  value='".$row['groupid']."'><span id='btn_text'>Add</span></button>";
						}
		        echo "</td>";
		        echo "</tr>";

       		}
        ?>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
</body>
</html>
