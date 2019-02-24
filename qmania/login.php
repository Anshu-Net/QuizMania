<!DOCTYPE html>
<html>
<head>
  <title>login</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <!-- <script type="text/javascript" src="login.js" ></script> -->
</head>
<body>
<div class="logo">
<!-- <img src="qmania.PNG" alt="logo" width="200px" height="100px">
 --></div>
  <div class="login-page">
    <div class="form">
      <form class="login-form" method="POST" action="function/login.php">
        <input type="text" name="username" placeholder="username" required />
        <input type="password" name="password" placeholder="password" required />
        <button type="submit">login</button>
        <p class="message">Not registered? <a href="student/register.php">Create an account</a></p>
      </form>
    </div>
  </div>
</body>
</html>
