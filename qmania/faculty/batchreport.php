<?php

 require '../function/connection.php';
 require 'function/viewuser.php';
 require 'function/getgroup.php';
 // require 'function/batch.php';
 require '../function/getbatch.php';
 // 
 //$result=view_user('student',$conn);
 $id='';
  if(isset($_GET['id']))
  {
    $id=$_GET['id'];
  }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<html lang="en">
<head>
  <title>QuizMania|Faculty</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="table2excel.js" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="faculty.css">
</head>
<body>


<script type="text/javascript">
        $(function () {
            $("#btnExport").click(function () {
                $("#tblCustomers").table2excel({
                    filename: "Report.xls"
                });
            });
        });
    </script>

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

  <h3>Batch Report</h3>
  <form class="form-inline" method="POST" action="batchreport.php">
    <div class="form-group">
      <select class="form-control" name="batch" required>
          <option value="" disabled selected>Select Batch:</option>
          <?php
          echo "Result";
            while($row=$result->fetch_assoc())
            {
              echo "<option value=".$row['batchname'].">".$row['batchname']."</option>";
            }
          ?>
      </select>
      <select class="form-control" name="group" required>
          <option value="" disabled selected>Select Group:</option>
          <?php
            while($row=$result_group->fetch_assoc())
            {
              echo "<option value='".$row["groupname"]."'>".$row["groupname"]."</option>";
            }
          ?>
      </select>
      <button type="submit" id="btnSubmit" class="btn btn-info">Search</button>
    </div> 
     <table class="table table-hover" id="tblCustomers">
     <?php
     if(isset($_POST['batch']) && isset($_POST['group']))
     {
        $batch=$_POST['batch'];
      $group=$_POST['group'];

      $sql = "select * from `group` where `groupname`='$group'";

      $result4=$conn->query($sql);
      while ($rowset=$result4->fetch_assoc()) {
        $groupid=$rowset['groupid'];
        $groupname=$rowset['groupname'];
      }


     $sql3 = "SELECT DISTINCT quiz.quizname from quizmap,quiz,`group`  where quizmap.group_id=$groupid AND quizmap.quiz_id=quiz.quizid and `group`.`groupname`='$groupname'";
     $result3=$conn->query($sql3);
     // echo $sql3;
    
            echo "<thead>"; 
            echo "<tr>";
            echo "<th>Student USN</th>";
             while($row3=$result3->fetch_assoc())
            {
              $quiznames[]=$row3['quizname'];
            echo "<th>".$row3['quizname'];
            }
            echo "</tr>";
            echo "</thead>";           
          
     }
      
     ?>
    <tbody>
    <?php
    if(isset($_POST['batch']) && isset($_POST['group']))
     {
      $batch=$_POST['batch'];
      $sql = "SELECT * FROM `users` WHERE batch = '$batch'";
      $result=$conn->query($sql);
      // echo $sql;
        while($row=$result->fetch_assoc())
          {
            $isFL=false;
            $isSL=false;
            $uid=$row['userid'];
            echo "<tr>";
            echo "<td>".$row['userid'];
            // echo "<td>".$row['fname']." ".$row['lname'];
            foreach ($quiznames as $s => $value) {
              echo"<td>";
                $sql4 = "SELECT * FROM quiz WHERE quizname = '$value'";
                $result4=$conn->query($sql4); 
                if($result4->num_rows<=0)echo"0";  
                  while ($rowset5=$result4->fetch_assoc()) {
                   
                    $isFL=true;
                    $qid=$rowset5['quizid'];

                    $sql6 = "SELECT * FROM `rank` where quizid = $qid AND userid ='$uid' ";


                        $rset=$conn->query($sql6);
                        
                        if($result4->num_rows>=1 && $rset->num_rows<=0)echo"0";
                          while ($r=$rset->fetch_assoc()) {
                           
                           $isSL=true;
                            if ($r['score']>0) {
                              echo $r['score'];
                             
                            }   
                          }


                        }
                        
                          
              
                  }


              echo"</td>";
              }

             echo"</tr>"; 

          }
        
       ?>

    </tbody>
    </table>
    <button type="button" id="btnExport" class="btn btn-success">Export</button>
</div>
</form>
<!-- <input type="button" id="btnExport" value="Export" /> -->

  </div>


</body>
</html>
