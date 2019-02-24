<?php
  require 'function/viewquiz.php';
  if(isset($_POST['keyword']))
  {
    $keyword=$_POST['keyword'];
    $result=viewQuizFilter($keyword);
  }
  else
  {
    $result=viewQuiz();
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
  <h2>Quiz List</h2>
  <form class="form-inline" method="POST" action="">
    <div class="form-group">
      <input type="text" name="keyword" class="form-control" placeholder="Quiz name" id="keyword" required>
      <button type="submit" class="btn btn-success">Search</button></div>
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Quiz Name</th>
        <!-- <th>Marks</th> -->
        <th>Status</th>
      </tr>
    </thead>
    <tbody>

      <?php
          while($row=$result->fetch_assoc())
          {
            echo "<tr>";
            echo"<td>".$row['quizname']."</td>  <td>".$row['status']."</td>
            <td><div class='btn-group'><button type='button' class='btn btn-primary dropdown-toggle' data-toggle='dropdown'>Action <span class='caret'></span></button>
            <ul class='dropdown-menu' role='menu'>
            <li><a href='function/quizchangestatus.php?id=".$row['quizid']."&status=activated'>Publish</a></li>";
            echo "<li><a href='addquestion.php?id=".$row['quizid']."'>Add Questions</a></li>";
            echo "<li><a href='function/quizchangestatus.php?id=".$row['quizid']."&status=De-activated'>De-activate</a></li></ul></div></td>";
            echo "</tr>";
          }
        ?>


    </tbody>
  </table>
</div>

</body>
</html>
