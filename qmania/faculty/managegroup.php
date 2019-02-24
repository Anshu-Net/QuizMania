<?php
$id='';
  if(isset($_GET['id']))
  {
    $id=$_GET['id'];
  }
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
<h2>Group List</h2>
<table class="table table-hover">
  <thead>
    <tr>
      <th>Group Name</th>
      <th>Batch</th>
      <th>Status</th>
    </tr>
  </thead>
  <tbody>
    <tr>
<?php
          require 'function/viewgroups.php';
          $result=viewGroups();
        	while($row=$result->fetch_assoc())
       		{
       			echo "<tr>";
		        echo "<td>".$row['groupname']."</td>";
            echo "<td>".$row['batch']."</td>";
            echo "<td>".$row['status']."</td>";
						echo "<td>";
						echo '<td><div class="btn-group">
                  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                  Action <span class="caret"></span></button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="function/changestatus.php?id='.$row["groupid"].'&status=activated">Active</a></li>
                    <li><a href="function/changestatus.php?id='.$row["groupid"].'&status=De-activated">De-Active</a></li>
                    <li><a href="addstudent.php?id='.$row["groupid"].'&batch='.$row['batch'].'">Manage</a></li>
                  </ul>
                </div></td>';

       		}?>
  </tbody>
</table>
</div>

</body>
</html>
