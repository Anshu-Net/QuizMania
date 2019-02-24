<?php
  require '../function/getbatch.php';
?>
<!DOCTYPE html>
<html>
<head>
  <title>Register</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <script type="text/javascript" src="login.js" ></script>

</head>
<body>
  <div class="login-page">
    <div class="form">
      <form class="login-form" method="POST" action="../function/register.php">
        <input type="text" name="usn" placeholder="USN" required />
        <input type="text" name="first_name" placeholder="First Name" required/>
        <input type="text" name="last_name" placeholder="Last Name" required/>
        <input type="email" name="email" placeholder="Email" required/>
        <div class="maxl">
          <label class="radio inline">
              <input type="radio" name="gender" value="male" checked>
              <span> Male </span>
           </label>
          <label class="radio inline" required>
              <input type="radio" name="gender" value="female">
              <span>Female </span>
          </label>
        </div>
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
        <input type="password" id="password" name="password" placeholder="password" required/>
        <input type="password" name="confirm_password" id="confirm_password" placeholder="Re-enter password" onkeyup='check();' required/><span id='message'></span>
        <select name="batch" required>
          <option value="" disabled selected>Select Batch:</option>
          <?php
            while($row=$result->fetch_assoc())
            {
              echo "<option value=".$row['batchname'].">".$row['batchname']."</option>";
            }
          ?>
        </select>
        <button type="submit" id="btnSubmit" value="Submit" onclick="return Validate()" />create</button>
        <p class="message">Already registered? <a href="../login.php">Sign In</a></p>
      </form>
    </div>
  </div>
</body>
</html>
