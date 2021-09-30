<?php 
session_start();
$conn = mysqli_connect('localhost:3306', 'root','root','todo_app');

if (isset($_POST['register'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];
  $s = "SELECT * FROM user_form WHERE username = '$username'";
  $query = mysqli_query($conn,$s);
  $nums = mysqli_num_rows($query);
  
    
  if ($nums == 1 ) {
    echo '<script>alert("Username already exist")</script>';
  } else{
      $i = "INSERT INTO user_form(username,password) VALUES('$username','$password')";
      if (mysqli_query($conn,$i)) {
      echo '<script>alert("Register Successfully")</script>';
    }
  }
}

if (isset($_POST['login'])) {
  $username = $_POST['login_username'];
  $password = $_POST['login_password'];
  $s = "SELECT * FROM user_form WHERE username = '$username' && password = '$password'";
  $query = mysqli_query($conn,$s);
  $nums = mysqli_num_rows($query);
  $users = mysqli_fetch_all($query, MYSQLI_ASSOC);
    
  if ($nums == 1) {
     $_SESSION['direct'] = true;
    foreach ($users as $user){
      $_SESSION['userid'] = $user['user_id'];
      $_SESSION['username'] = $user['username'];
    }
    if ($_SESSION['direct']) {
      header('location: home.php');
    } else{
      header('location: index.php');
    }
  } else{
    header('location: index.php');
    echo '<script>alert("Check Email or Password")</script>';
  }
}


?>

<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Todo App</title>
  <script src="https://kit.fontawesome.com/0615dc2069.js" crossorigin="anonymous"></script>
  
  <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    <div class="form-container">
      <div class="form login-form">
        <h1>Login</h1>
        <form action="index.php" method="POST" accept-charset="utf-8">
          <input type="text" name="login_username" id="" value="" placeholder="Username" />
          <input type="password" name="login_password" id="" value="" placeholder="Password"/>
          <button type="submit" name="login">Login</button>
          <div>
            <label for="">Dont have an account?</label>
            <a class="register">Register Here</a>
          </div>
        </form>
      </div>
      <div class="form register-form">
        <h1>REGISTER</h1>
        <form action="index.php" method="POST" accept-charset="utf-8">
          <input type="text" name="username" id="" value="" placeholder="Register Username" />
          <input type="password" name="password" id="" value="" placeholder="Register Password"/>
          <button type="submit" name="register">Register</button>
          <div>
            <label for="">Already have an account?</label>
            <a class="login">Login Now</a>
          </div>
        </form>
      </div>
    </div>
    <script src="js/main.js"></script>
  </body>
</html>