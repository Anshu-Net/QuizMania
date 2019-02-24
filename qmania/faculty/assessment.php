<?php

 require '../function/connection.php';
 require 'function/assessment.php';
$quid_id;
if (isset($_GET['id'])) {
   $quid_id=$_GET['id'];
   $sql2="SELECT `quizname` FROM `quiz` where `quizid`='$quid_id'";
    $result2=$conn->query($sql2);
    $row=$result2->fetch_assoc();
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
    </style>
  <script type="text/javascript">
   $( document ).ready(function() {
        var quizid=<?php echo $quid_id;  ?>;
        $('.verify').click(function(){
        var data=$(this).val();
        console.log(data);
         // var descmark=$('#'+data).val();
       
        //console.log("my data:"+data);
       // console.log(descmark);
        /*console.log(quizid);*/
        var mydata=data.split("-");
        answerid=mydata[0];
        userid=mydata[1];
        var descmark=$('#'+answerid).val();
        console.log(mydata);
        console.log(descmark);
        // var answer = $(this).prev().find('input[type=text]').eq(0);
        // var ele=answer.prevObject.prevObject["0"].value;
        // console.log(ele);
        // var descmark=ele;
        location.reload();
       $.get("function/descmark.php?descmark="+descmark+"&quizid="+quizid+"&answerid="+answerid+"&userid="+userid, function(data){
             // alert(data);

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
  <h3>Descriptive questions</h3>

  <div class="well well-sm">
  <h3><?php echo $qname ?></h3>
  <?php
      while($row=$result->fetch_assoc())
          {
            echo " <h4>";
          echo "<tr>";
           echo "<td>".$row['question']." Marks:".$row['mark']."</td>";
           echo "</tr>";
            echo "</h4>";
          ?>
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Student USN</th>
        <th>Answer</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
     <?php
     $quesid=$row["quesid"];
     $sql1= "SELECT * FROM `answer` WHERE `quesid`= $quesid AND `status` = 'pending'";
    $result1=$conn->query($sql1);
       while($row2=$result1->fetch_assoc())
      {
           echo "<tr>";
           $ansid=$row2['answerid'];
           echo "<td>".$row2['userid']."</td>";
           echo "<td>".$row2['answerdesc']."</td>";
           echo "<td><div class='col-xs-3'><input type='number' name='answerdescmark' class='form-control answerdesc' placeholder='Marks' id=".$ansid." required></div></td>";
           echo "<td><button type='submit' id='verify' value='".$row2['answerid']."-".$row2['userid']."-".$row2['answerdesc']."' class='btn btn-success verify'>Verify</button></td>";
           echo "</tr>";
       }

          ?>
    </tbody>
  </table>
<?php
  }
?>
  </div>
  </div>
</div>

</body>
</html>
