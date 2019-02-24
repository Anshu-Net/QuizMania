<?php
require 'connection.php';
$usn=$_POST['usn'];
$first_name=$_POST['first_name'];
$last_name=$_POST['last_name'];
$email=$_POST['email'];
$gender=$_POST['gender'];
$password=$_POST['password'];
$batch=$_POST['batch'];
$sql = "INSERT INTO `users`(`userid`, `fname`, `lname`, `password`, `gender`, `email`, `batch`, `type`)
VALUES ('$usn','$first_name','$last_name','$password','$gender','$email','$batch','student')";

if ($conn->query($sql) === TRUE) {

  echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Succesfully Registered!!! Ask Admin to Activate your account.')
    window.location.href='../login.php';
    </SCRIPT>");
  //  echo "New record created successfully";
  // header('Location: ../login.php');
} else {
  //  echo "Error: " . $sql . "<br>" . $conn->error;
    echo ("<SCRIPT LANGUAGE='JavaScript'>
      window.alert('Inavalid details!!')
      window.location.href='../student/register.php';
      </SCRIPT>");
}

$conn->close();
?>
