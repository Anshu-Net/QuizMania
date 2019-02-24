<?php
  require '../function/connection.php';
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
      <li><a href="../function/logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
    </ul>
  </div>
</nav>
<div class="container">
  <h3>Reset Password</h3>
  <form class="form-inline" method="GET" action="function/resetpassword.php">
    <div class="well">
    <div class="form-group">
     <script type="text/javascript">
        function Validate() {
            var password = document.getElementById("password").value;
            var confirmPassword = document.getElementById("confirm_password").value;
            if (password != confirmPassword) {
                alert("Passwords do not match.");
                return false;
            }
            return true;
        }
       </script>
      <label for="Reset Password">New Password:</label>
      <input type="password" name="password" class="form-control" placeholder="New password" id="password" required>
      <input type="password" name="confirm_password" class="form-control" placeholder="Confrim Password" id="confirm_password" required>
      <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
    </div>
    <button type="submit" class="btn btn-success" id="btnSubmit" value="Submit" onclick="return Validate()" />Reset</button>
  </form></div>


</body>
</html>
