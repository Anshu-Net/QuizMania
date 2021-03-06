<?php

  require '../function/connection.php';
  require 'function/viewuser.php';
  $result=view_user('faculty',$conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>QuizMania|Admin</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="admin.css">
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">QuizMania|Admin</a>
    </div>
    <ul class="nav navbar-nav">
      <li class=""><a href="admin.php">Home</a></li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Users <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="studentlist.php">Student</a></li>
          <li><a href="facultylist.php">Faculty</a></li>
        </ul>
      </li>
      <li><a href="addfaculty.php">Add Faculty</a></li>
      <li><a href="addbatch.php">Add Batch</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="../login.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
    </ul>
  </div>
</nav>

</thead>
  <div class="container">
  <h2>Faculty List</h2>
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Username</th>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Status</th>

      </tr>
    <tbody>
      <?php
        while($row=$result->fetch_assoc())
          {
            echo "<tr>";
            echo "<td>".$row['userid']."</td>";
            echo "<td>".$row['fname'];
            echo "<td>".$row['lname'];
            echo "<td>".$row['status'];

             echo '<td><div class="btn-group">
                  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                  Action <span class="caret"></span></button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="function/userstatus.php?type=faculty&id='.$row["userid"].'&status=activated">Active</a></li>
                    <li><a href="function/userstatus.php?type=faculty&id='.$row["userid"].'&status=De-activated">De-Active</a></li>
                    <li><a href="resetpassword.php?id='.$row["userid"].'">Reset Password</a></li>
                  </ul>
                </div></td>';
            echo "</tr>";
          }
       ?>
    </tbody>
  </table>
</div>

</body>
</html>
