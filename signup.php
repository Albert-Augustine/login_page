<!DOCTYPE html>
<html>
  <head>
    <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
    <meta content="utf-8" http-equiv="encoding">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="loginpage.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
<body>
  <?php
    $conn = mysqli_connect("localhost", "root", "user123", "login");
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $phno = $_POST['phno'];
    $a=0;
    if (isset($_POST['signup'])) {
      $sql1 = "SELECT * FROM signup WHERE username='$username'";
      if ($r = $conn->query($sql1)) {  
        if (mysqli_num_rows($r)) {
          $h="Use another Username";
          // exit();
          $a++;
        }
        elseif ($username == null) {
          $h="Username box is empty";
          // exit();
          $a++;
        }
      }
      $sql4 = "SELECT * FROM signup WHERE password='$password'";
      if ($r = $conn->query($sql4)) {  
        if (mysqli_num_rows($r)) {
          $i= "Use strong password";
          // exit();
          $a++;
        }
        elseif ($password == null) {
          $i= "Password box is empty";
          // exit();
          $a++;
        }
        elseif((!preg_match('/^[#?!@$%^&*-][A-Z](?=.*?[0-9]).{6,}$/', $password))) {
          $i= "Required a symbol,caps,number and total 8 chara";
          $a++;
        }
      }
      $sql2 = "SELECT * FROM signup WHERE email='$email'";
      if ($r = $conn->query($sql2)) {  
        if (mysqli_num_rows($r)) {
          $j= "Use another Email";
          // exit();
          $a++;
        }
        elseif ($email == null) {
          $j= "Email box is empty";
          // exit();
          $a++;
        }
        elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          $j= "Invalid email format";
          // exit();
          $a++;
        }
      }
      $sql3 = "SELECT * FROM signup WHERE phno='$phno'";
      if ($r = $conn->query($sql3)) {  
        if (mysqli_num_rows($r)) {
          $k= "Use another Phone Number";
          // exit();
          $a++;
        }
        elseif ($phno == null) {
          $k= "Phone number box is empty";
          // exit();
          $a++;
        }
        elseif (is_numeric($phno) != 1 ) {
          $k= "Enter numeric number";
          // exit();
          $a++;
        }
        elseif((!preg_match('/^(?=.*?[0-9]).{10,}$/', $phno))) {
          $k= "Required total 10 Number";
          $a++;
        }
      }
      if ($a==0) {
        if ($conn->connect_error) {
        echo("Connection failed");
        }
        $sql = "INSERT INTO signup (username,password,email,phno)VALUES ('$username','$password','$email','$phno')";
        if ($conn->query($sql) === TRUE) {
          echo "hello";
        } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
        }
      }
    }
  ?>
  <div>
    <img src="2.jpg" class="image">
    <div class="login login_head">
      <p>SIGN UP PAGE</p>
      <form method="post" class="login_element login_button">
        <label>Username:</label><input type="text" name="username" value="<?php echo isset(($_POST["username"])) ? $_POST["username"] : '' ?>"><span><?php echo "<label>" . $h . "</label>"; ?></span><br><br>
        <label>Password:</label><input type="password" name="password" class="password"><span><?php echo "<label>" . $i . "</label>"; ?></span><br><br>
        <label>Email:</label><input type="text" name="email" class="email" value="<?php echo isset(($_POST["email"])) ? $_POST["email"] : '' ?>"><span><?php echo "<label>" . $j . "</label>"; ?></span><br><br>
        <label>Ph.No:</label><input type="text" name="phno" class="phno" value="<?php echo isset(($_POST["phno"])) ? $_POST["phno"] : '' ?>"><span><?php echo "<label>" . $k . "</label>"; ?></span><br><br>
        <input type="submit" value="Sign up" name="signup">
      </form>
    </div>
  </div>
</body>
</html>