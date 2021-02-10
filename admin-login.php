<?php
   session_start();
   include("config.php");
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      
      $email = mysqli_real_escape_string($conn,$_POST['email']);
      $password = mysqli_real_escape_string($conn,$_POST['password']); 
      
      $sql = "select * FROM admin WHERE email = '$email' and password = '$password'";
      $result = mysqli_query($conn,$sql);
      
      $count = mysqli_num_rows($result);
		
      if($count == 1) {
        $_SESSION['admin'] = true;
         header("location: admin-home.php");
      }else {
        $errorTitle = "Invalid Credentials";
         $error = "Your Email or Password are not valid";
      }
   }
?>

<!DOCTYPE html>
  <head>
    <link rel="stylesheet" href="./css/style.css" />
    <link rel="stylesheet" href="./css/tables.css" />
    <link rel="icon" href="logo.png">
    <title>Login | Error</title>
  </head>
  <body>
    <header>
      <nav class="row">
        <div class="row">
          <img class="logo-image" src="logo.png" alt="" />
          <h1 class="logo">JUST LAB</h1>
        </div>
    </header>
    <main>
        <fieldset class="message-card">
            <legend><?php echo $errorTitle; ?></legend>
            <br>
            <?php echo "<p class='warning'>$error</p>"; ?>
            <div class="operations row row-end">
          <a href="admin-login.html">Retry Login</a>
        </div>
        </fieldset>
    </main>
  </body>
</html>