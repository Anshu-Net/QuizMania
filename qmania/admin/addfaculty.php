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
<<div class="container">
  <h3>Add Faculty</h3>
  <form class="col-xs-4" method="POST" action="function/addfaculty.php">
<div class="well">
    <div class="form-group">
      <label for="username">Username:</label>
      <input type="text" name='uname' class="form-control" id="userid" required>
    </div>
  <div class="form-group">
    <label for="Fname">First Name:</label>
    <input type="text" name="first_name" class="form-control" id="fname" required>
  </div>
  <div class="form-group">
    <label for="Lname">Last Name:</label>
    <input type="text" name="last_name" class="form-control" id="lname" required>
  </div>
  <div class="form-group">
    <label for="email">Email:</label>
    <input type="email" name='email' class="form-control" id="email" required>
  </div>
  <div class="form-group">
    <label for="gender">Gender:</label>
    <label class="radio-inline"><input type="radio" name="gender" value="male" checked>Male</label>
    <label class="radio-inline"><input type="radio" name="gender" value="female">Female</label>
    </div>
  <div class="form-group">
    <label for="password">Password:</label>
    <input type="password" name="password" class="form-control" id="password" required>
  </div>
  <button type="submit" class="btn btn-success">Add</button>
</form></div>
</div>

</body>
</html>
