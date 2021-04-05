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
	<div>
		<img src="1.jpeg" class="image">
    <div class="login login_head">
      <p>LOGIN PAGE</p>
      <form method="post" class="login_element login_button">
        <label>Username:</label><input type="text" name="username"><br><br>
        <label>Password:</label><input type="password" name="password" class="password"><br><br>
        <input type="submit" value="Login" name="login">
        <a href="signup.php"><span>Sign Up</span></a>
        <a href="forgotpassword.php"><span>Forgot Password</span></a>
      </form>
    </div>
	</div>
  <?php 
    $conn = mysqli_connect("localhost" ,"root","user123","login");
    $username = $_POST['username'];
    $password = $_POST['password'];
    if ($conn->connect_error) {
      echo("Connection failed");
    }
    if (isset($_POST['login'])) { 
      $sql = "SELECT * FROM signup WHERE username='$username' AND password='$password'";
      if ($r = $conn->query($sql)) {  
        if (mysqli_num_rows($r)) {
          echo "login succesfull";
        }
        else {
          echo "incorrect credentials";
        }
      }
    } 
  ?>
</body>
</html>