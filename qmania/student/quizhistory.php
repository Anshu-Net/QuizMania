<?php
session_start();
    $student_id=$_SESSION['id'];
    require '../function/connection.php';
    $fname=$_SESSION['fname'];
    function status($id,$student_id,$conn)
    {
      $sql = "SELECT * FROM `rank` WHERE userid='$student_id' AND quizid='$id'";
      $result=$conn->query($sql);
      if (mysqli_num_rows($result) > 0) {
          
          $row=$result->fetch_assoc();
          if($row['status'] == "completed")
          {
            return $row['score'];
          }
          else
          {
            return $row['status'];
          }
          
      }
      else
      {
        return "take";
      }
      
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>QuizMania|Student</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="student.css">
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">QuizMania|Student</a>
    </div>
    <ul class="nav navbar-nav">
      <li class=""><a href="student.php">Home</a></li>
      <li><a href="quizhistory.php">Quiz History</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="../function/logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
    </ul>
  </div>
</nav>

<div class="container">
  <h3>Welcome <?php echo $fname; ?> !!</h3>
  <h2>Quiz List</h2>
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Quiz Name</th>
        <th>Marks Obtained</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <?php
      $sql="SELECT * FROM `quiz` WHERE status='De-activated' AND `quizid` IN (SELECT quiz_id FROM `quizmap` WHERE `group_id`IN (SELECT `groupid` FROM `groupmap` WHERE `userid`='$student_id'))";
      $result=$conn->query($sql);
      while($row=$result->fetch_assoc()){
        $quizid=$row['quizid'];
        
        echo "<tr>";
          echo "<td>".$row['quizname']."</td>";
          
          if(status($quizid,$student_id,$conn)=='take'){
              echo "<td></td>";
              
          } 
          else if(status($quizid,$student_id,$conn)=='pending')
          {
            echo "<td></td>";
            
          }
          else
          {
            echo "<td>".status($quizid,$student_id,$conn)."</td>";
            
          }
         
        echo "</tr>";
      }

      ?>

    </tbody>
  </table>
</div>


</body>
</html>
