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
		<img src="3.jpeg" class="image">
    <div class="login login_head">
      <p>FORGOT PASSWORD PAGE</p>
      <form class="login_element login_button" method="post">
        <label>User Name:</label><input type="text" name="username"><br><br>
        <label>Email:</label><input type="text" name="email" class="emailforgot"><br><br>
        <label>New Password:</label><input type="password" name="password" class="password"><br><br>
        <input type="submit" value="Submit" name="submit" class="check" onclick="location.href = 'index.php';">
      </form>
    </div>
	</div>
  <?php 
    $conn = mysqli_connect("localhost" ,"root","user123","login");
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    if ($conn->connect_error) {
      echo("Connection failed");
    }
    if (isset($_POST['submit'])) { 
      $sql = "SELECT * FROM signup WHERE email='$email' AND username='$username'";
      if ($r = $conn->query($sql)) {  
        if (mysqli_num_rows($r)) {
           $sql2 = "UPDATE signup SET password='$password' WHERE email='$email'" ;
          if ($conn->query($sql2) === TRUE) {
            echo "done";
          }
        }
        else {
          echo "fail";
        }
      }
    }
  ?>
</body>
</html>