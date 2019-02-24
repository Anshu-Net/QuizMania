<?php
require '../function/connection.php';
    $id='';
    if(isset($_GET['id']))
    {
      $id=$_GET['id'];
    }
     session_start();
      if(!$_SESSION['id'])
  {
    header('Location: ../');
  }


    $student_id=$_SESSION['id'];
     $sql = "SELECT * FROM `rank` WHERE userid='$student_id' AND quizid='$id'";
      $result=$conn->query($sql);
      if (mysqli_num_rows($result) > 0) {
          
          $row=$result->fetch_assoc();
          if($row['status'] == "completed" || $row['status'] == "pending")
          {
             header('Location: ../');
          }
      }

    require '../function/connection.php';
    function viewQuestions($id,$conn){
      $sql="SELECT * FROM `questions` WHERE quizid='$id'";
            $result=$conn->query($sql);
            return $result;
    }
    $sql="SELECT `quizname`,`timer` FROM `quiz` where `quizid`='$id'";
    $result=$conn->query($sql);
    $row=$result->fetch_assoc();
    $qname=$row['quizname'];
    $timer=$row['timer'];

      $sql2="SELECT SUM(`mark`) as `total` FROM `questions` WHERE `quizid`='$id'";
    $result2=$conn->query($sql2);
    // $row2 = mysql_fetch_assoc($result2); 
    $row2=$result2->fetch_assoc();
    $sum=$row2['total'];
     // echo $sum;

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
  <style>
h3 {
  text-align: right;
  margin-top: 0px;
}
</style>
  <script type="text/javascript">
		$( document ).ready(function() {
      var marks=0;
      $('.multiple').click(function(){

        var data=$(this).val();
        console.log("Multiple "+data);
        if(data){
          data=data.split('+');
          var option_id=data[0];
          var question_id=data[1];
          console.log(option_id);
          console.log(question_id);

          $.get("function/getanswer.php?quesid="+question_id+"&optid="+option_id+"", function(data){
            //console.log("Multiple");
              marks=marks+parseInt(data);
              console.log(marks);
          });
        }

      });

      $('.descriptive').click(function(){
        var data=$(this).val();
        //var ele=$(this).prev().prev().find('textarea').eq(0);
        //console.log(ele.prevObject.prevObject["0"].value);

        var answer=$('#'+data).val();
        //var answer=ele.prevObject.prevObject["0"].value;
        var question_id=data;
        console.log(answer);

        $('#'+question_id).attr('readonly', true);
        $.get("function/descanswer.php?answer="+answer+"&quesid="+question_id+"", function(data){
            console.log(data);
            
        });

      });

      $('.option').click(function(){
        var data=$(this).val();
        data=data.split('+');
        var option_id=data[0];
        var question_id=data[1];
         $.get("function/getanswer.php?quesid="+question_id+"&optid="+option_id+"", function(data){
          console.log("Option");
            console.log(data);
             marks=marks+parseInt(data);
            console.log(marks);
        });

      });

        $('#btnsubmit').click(function(){
          var quizid=<?php echo $id?>;
          $(".descriptive").trigger("click");
          $.get("function/quizsubmit.php?marks="+marks+"&quizid="+quizid, function(data){
              console.log(data);
              window.location = "/qmania/student/student.php";
          });
       });
        // Set the date we're counting down to
var date=new Date();
date.setMinutes(date.getMinutes()+parseInt('<?php echo $timer ?>'));
var countDownDate = date.getTime();
// Update the count down every 1 second
var x = setInterval(function() {

    // Get todays date and time
    var now = new Date().getTime();
    
    // Find the distance between now and the count down date
    var distance = countDownDate - now;
    
    // Time calculations for days, hours, minutes and seconds
    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
    // Output the result in an element with id="demo"
    document.getElementById("demo").innerHTML = hours + "h " + minutes + "m " + seconds + "s ";
    
    // If the count down is over, write some text 
    if (distance < 0) {
        clearInterval(x);
        document.getElementById("demo").innerHTML = "EXPIRED";
         var quizid=<?php echo $id?>;
          $.get("function/quizsubmit.php?marks="+marks+"&quizid="+quizid, function(data){
              console.log(data);
              window.location = "qmania/student/student.php";
          });

    }
}, 1000);

    });

  </script>

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

   <h2><?php echo $qname." -Marks:" .$sum ?></h2>
  <h3 id="demo"></h3>

<!--  <form class="form" method="POST" action="function/quizsubmit.php"> -->
  <div class="well well-sm">
  <?php
    $counter = 1;
    $result=viewQuestions($id,$conn);
    while($row=$result->fetch_assoc())
    {
      if($row['questype']=== 'multiplechoice'){
        echo "<td>" . $counter . ". </td>"; 
        echo '<label for="question">'.$row["question"].' (Choose correct answer) </label>'; 
        echo '<label for="marks">  Marks:'.$row['mark'].' </label><div></div>';
        $quid=$row['quesid'];
        $sql2="SELECT * FROM `option` WHERE `quesid`='$quid'";
        $options_result=$conn->query($sql2);
        while($option=$options_result->fetch_assoc())
        {
          echo '<label class="radio-inline multiple"><input type="radio" class="multiple" value="'.$option['option_id'].'+'.$quid.'" name="optradio1">'.$option['options'].'</label>';
          
          echo '<br>';
        }
        echo "<hr>";
        
      }
      else if($row['questype']=== 'truefalse')
      {
        echo "<hr>";
        echo "<td>" . $counter . ". </td>"; 
        echo '<label for="question">'.$row["question"].' (True/False):</label>';
        echo '<label for="marks">Marks:'.$row['mark'].'</label><div></div>';
        $quid=$row['quesid'];
        $sql2="SELECT * FROM `option` WHERE `quesid`='$quid'";
        $options_result=$conn->query($sql2);
        while($option=$options_result->fetch_assoc())
        {
          if($option['options'] == 'true')
          {
            echo '<label class="radio-inline"><input type="radio" class="option" value="'.$option['option_id'].'+'.$quid.'" name="'.$quid.'">'.$option['options'].'</label>';
            echo '<br>';     
            echo '<label class="radio-inline"><input type="radio" class="option" value="false" name="'.$quid.'">false</label>';
          }
          else
          {
            echo '<label class="radio-inline"><input type="radio" class="option" value="true" name="'.$quid.'">true</label>';
            echo '<br>';     
            echo '<label class="radio-inline"><input type="radio" class="option" value="'.$option['option_id'].'+'.$quid.'" name="'.$quid.'">'.$option['options'].'</label>';
          }
        }
        echo "<hr>";
      }
      else if($row['questype'] === 'descriptive')
      {
        echo "<td>" . $counter . ". </td>"; 
        $quid=$row['quesid'];
        echo '<label for="question">'.$row["question"].' (Descriptive):</label>';
        echo '<label for="marks">Marks:'.$row['mark'].'</label><div></div>';
        echo '<label for="answer">Answer:</label>';
        echo '<textarea class="form-control answer" rows="2" id="'.$quid.'"></textarea>';
        echo '<br>'; 
        echo '<button value="'.$quid.'" class="btn btn-primary descriptive">Add</button>';
        echo '<br>'; 
        echo '</hr>';
      }
      $counter++;
    }
     echo '<br>';
   echo '<button type="submit" id="btnsubmit" class="btn btn-success">Submit</button>'; 
  ?>




</div>
</body>
</html>
