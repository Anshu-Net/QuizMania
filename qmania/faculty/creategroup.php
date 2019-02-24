<?php
 require '../function/getbatch.php';
 require '../function/connection.php';
 require 'function/viewuser.php';
 require '../function/getbatch.php';
 //$result=view_user('student',$conn);
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

  <h3>Create Groups</h3>
  <form class="form-inline" method="POST" action="function/creategroup.php">
    <div class="form-group">
      <label for="groupname">Group Name:</label>
      <input type="text" name="groupname" class="form-control" id="groupname" required>
      <select class="form-control" name="batch" required>
          <option value="" disabled selected>Select Batch:</option>
          <?php
            while($row=$result->fetch_assoc())
            {
              echo "<option value=".$row['batchname'].">".$row['batchname']."</option>";
            }
          ?>
      </select>
      <button type="submit" class="btn btn-success">Create</button>
    </div> 
</div>
</form>
  </div>

<!-- <div class="container">
  <h3>Create Groups</h3>
  <form class="form-inline" action="/action_page.php">
    <div class="form-group">
      <label for="groupname">Group Name:</label>
      <input type="text" name="groupname" class="form-control" id="groupname" required>
    </div>

    <div class="container">
  <h2>list of student sorted by batch:</h2>
  <div class="form-group">
  <select name="Batch" class="form-control" required>
    <option value="" disabled selected>Select Batch:</option>
    <?php
  //    while($row=$result->fetch_assoc())
      {
  //      echo "<option value=".$row['batchname'].">".$row['batchname']."</option>";
      }
    ?>
  </select>
<button type="submit" class="btn btn-success">Search</button>
</div>
  <p>Select Students:</p>
    <div class="checkbox">
      <label><input type="checkbox" value="">student 1</label>
    </div>
    <div class="checkbox">
      <label><input type="checkbox" value="">student 2</label>
    </div>
    <div class="checkbox">
      <label><input type="checkbox" value="">student 3</label>
    </div>
</div>
  <button type="submit" class="btn btn-success">Create</button>
</form>
</div> -->
</body>
</html>
