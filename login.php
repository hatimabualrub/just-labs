<?php
   session_start();
   include("config.php");
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      
      $studentId = mysqli_real_escape_string($conn,$_POST['studentId']);
      $password = mysqli_real_escape_string($conn,$_POST['password']); 
      
      $sql = "SELECT ID, name FROM student WHERE ID = '$studentId' and password = '$password'";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      
      $count = mysqli_num_rows($result);
		
      if($count == 1) {
         $_SESSION['studentId'] = $row['ID'];
         $_SESSION['name'] = $row['name'];
         
         header("location: home.php");
      }else {
        $errorTitle = "Invalid Credentials";
         $error = "Your Student ID or Password are not valid";
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
            <a href="index.php">
                <h1 class="logo">JUST LAB</h1>
            </a>
        </div>
    </header>
    <main>
        <fieldset class="message-card">
            <legend><?php echo $errorTitle; ?></legend>
            <br>
            <?php echo "<p class='warning'>$error</p>"; ?>
            <div class="operations row row-end">
          <a href="login.html">Retry Login</a>
        </div>
        </fieldset>
    </main>
  </body>
</html>