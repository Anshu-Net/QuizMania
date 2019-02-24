<?php
  require '../function/connection.php';
  require 'function/result.php';
  $quid_id;
if (isset($_GET['id'])) {
   $quid_id=$_GET['id'];
   $sql1="SELECT `quizname` FROM `quiz` where `quizid`='$quid_id'";
    $result1=$conn->query($sql1);
    $row=$result1->fetch_assoc();
    $qname=$row['quizname'];
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
  <h2><?php echo $qname; ?></h2>
  
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Student USN</th>
        <th>Marks</th>
      </tr>
    </thead>
    <tbody>

      <?php
          while($row=$result->fetch_assoc())
          {
            echo "<tr>";
            echo"<td>".$row['userid']."</td>";
            echo"<td>".$row['score']."</td>
            <td><a class='btn btn-danger' href='function/reassgin.php?userid=".$row["userid"]."&quizid=$quid_id'>Re-Assign</a></td>";
            echo "</tr>";
          }
        
        echo "</tbody>";  
        echo "</table>"; 
        echo "<a class='btn btn-success' href='function/export.php?userid=".$row["userid"]."&quizid=$quid_id'>Export</a>";
    ?>
</div>

</body>
</html>
