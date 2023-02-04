<!DOCTYPE html>
<html>
  <head>
    <title>Login Page</title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
     
    <link rel="stylesheet" type="text/css" href="Login_styles.css">
     
  </head>
    
  <body>
      <?php

session_start();

if (isset($_POST['username']) and isset($_POST['password'])) {
 
  $username = $_POST['username'];
  $password = $_POST['password'];
 
  $connection = mysqli_connect("sql12.freemysqlhosting.net", "sql12594547", "HNHhsT7WiT", "sql12594547");
 
  $query = "SELECT * FROM db WHERE username='$username'";
 
  $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
  $count = mysqli_num_rows($result);
 
  if ($count == 1) {
    $userData = mysqli_fetch_assoc($result);
    $hashedPassword = $userData['password'];
    if (password_verify($password, $hashedPassword)) {
      $_SESSION['username'] = $username;
        date_default_timezone_set('Asia/Kathmandu');
      $_SESSION['login_timestamp'] = date('Y-m-d H:i:s');
      
    } else {
      $fmsg = "Invalid Login Credentials.";
    }
  } else {
    $fmsg = "Invalid Login Credentials.";
  }
}
 
if (isset($_SESSION['username'])) {
  $username = $_SESSION['username'];
  
    header("Location: homepage.php");
   
} else {
    
  ?>
  <!-- Login form HTML -->
  <?php if (isset($fmsg)) { ?><div class="alert alert-danger" role="alert"><?php echo $fmsg; ?></div><?php } ?>

    <div class="form">
      <h1>Login</h1>
       
      <form action="" method="POST">
        <input type="text" name="username" placeholder="Username" required />
         
        <input type="password" name="password" placeholder="Password" required />
         
        <input type="submit" value="Login" /><P></P>        
            
          <a href='forget_password.php'>Forget password</a><P></P>
          
          <a href='signup.php'>Sign Up</a>
      </form>
       
    </div>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    
  </body>
</html>
<?php } ?>
