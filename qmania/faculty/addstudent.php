<?php
 require '../function/getbatch.php';
 require '../function/connection.php';
 require 'function/viewuser.php';
 require 'function/checkgroupmap.php';
 $group_id;
 $batch;
 if (isset($_GET['id'])) {
   $group_id=$_GET['id'];
   $batch=$_GET['batch'];
 }
 $result=view_user('student',$batch,$conn);
 $group_id='';
 if (isset($_GET['id'])) {
   $group_id=$_GET['id'];
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script type="text/javascript">
$( document ).ready(function() {
    $('.add').click(function(){
        var student_id = $(this).val();
        var group_id='<?php echo $group_id; ?>'
        $.get("function/addgroupmap.php",{ student_id:student_id, group_id:group_id } ,function(data, status){
            //alert("Data: " + data + "\nStatus: " + status);
            if(data==='true')
            {
            console.log("Data: " + data + "\nStatus: " + status);
              //$(this).hide();

            }
            else{
              exit;
            }
        });
        $(this).text("Remove");
        $(this).attr("class","btn btn-success remove");

        location.reload();
      });


  $('.remove').click(function(){
    console.log("Remove");
    var student_id = $(this).val();
    var group_id='<?php echo $group_id; ?>'
    console.log(student_id,group_id);
     $.get("function/removegroupmap.php",{ student_id:student_id, group_id:group_id } ,function(data, status){
         console.log("Data: " + data + "\nStatus: " + status);
        if(data==='true')
        {
          //alert("Data: " + data + "\nStatus: " + status);
          //$(this).text("Add");
          $(this).text("Add");
          $(this).attr("class","btn btn-success add");


        }
        location.reload();
    });

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
<h2>Student List</h2><div class="form-group">
</div>
<table class="table table-hover">
  <thead>
    <tr>
      <th>USN</th>
      <th>Firstname</th>
      <th>Lastname</th>
      <th>Batch</th>
      <th>Status</th>
      <th> </th>

    </tr>
  </thead>
  <tbody>
     <?php
      while($row=$result->fetch_assoc())
        {
          echo "<tr>";
          echo "<td>".$row['userid']."</td>";
          echo "<td>".$row['fname']."</td>";
          echo "<td>".$row['lname']."</td>";
          echo "<td>".$row['batch']."</td>";
          echo "<td>".$row['status']."</td>";
          echo "<td>";
          if(check_group($row['userid'],$group_id,$conn)){
            echo "<button id='remove'  class='btn btn-success remove' value='".$row['userid']."'><span id='btn_text'>Remove</span></button>";
          }
          else
          {
            echo "<button id='add' class='btn btn-success add'  value='".$row['userid']."'><span id='btn_text'>Add</span></button>";
          }
          echo "</td>";
          echo "</tr>";

        }
     ?>

  </tbody>
</table>

</div>
