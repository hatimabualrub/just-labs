<?php
   include("config.php");
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      
      $studentId = mysqli_real_escape_string($conn,$_POST['studentId']);
      $password = mysqli_real_escape_string($conn,$_POST['password']);
      $name = mysqli_real_escape_string($conn,$_POST['name']);

      $sql = "SELECT * FROM student WHERE ID = $studentId";

      $result = mysqli_query($conn,$sql);
      if($result == FALSE) {
        $errorTitle = "Invalid Credentials";
        $error = "Your Student ID or Password is invalid";          
      } else {
        $count = mysqli_num_rows($result);
		
        if($count > 0) {
          $errorTitle = "Student ID Exist";
          $error = "Your Student ID is already exist";          
        }else {
          $sql = "INSERT INTO student (ID, name, password) VALUES ('".$studentId."','".$name."','".$password."')";
          if(mysqli_query($conn,$sql)){
              $_SESSION['studentId'] = $studentId;
              $_SESSION['name'] = $name;
              header("location: home.php");
          } else {
              $errorTitle = "Invalid Credentials";
              $error = "Your Student ID or Password is invalid";
          }
        }
      }
   }
   mysqli_close($conn);
?>

<!DOCTYPE html>
  <head>
    <link rel="stylesheet" href="./css/style.css" />
    <link rel="stylesheet" href="./css/tables.css" />
    <link rel="icon" href="logo.png">
    <title>Login</title>
  </head>
  <body>
    <header>
        <nav class="row">
        <div class="row">
            <img class="logo-image" src="logo.png" alt="" />
            <a href="index.php">
                <h1 class="logo">JUST LAB</h1>
            </a>
        </div>
        </nav>
    </header>
    <main>
        <fieldset class="message-card">
            <legend><?php echo $errorTitle; ?></legend>
            <br>
            <?php echo "<p class='warning'>$error</p>"; ?>
            <div class="operations row row-end">
                <a href="signup.html">Retry Sginup</a>
            </div>
        </fieldset>
    </main>
  </body>
</html>