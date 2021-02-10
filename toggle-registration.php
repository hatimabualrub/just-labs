<?php
  session_start();
  require_once("auth.php");
  isNotAdmin();
  include("config.php");

  $sql = "SELECT open_registration FROM admin WHERE email = 'admin@admin.com'";
  $result = mysqli_query($conn,$sql);
  if($result){
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $state = $row['open_registration'];
    if($state == 1) {
        $sql = "UPDATE admin SET open_registration=false WHERE 1";
    } else {
        $sql = "UPDATE admin SET open_registration=true WHERE 1";
    }

    if (mysqli_query($conn, $sql)) {
        header("location: home.php");
      } else {
        $errorTitle = "Cant Update";
         $error = "An Error Has Occurred. Try Another Time";
      }
  }
?>

<!DOCTYPE html>
  <head>
    <link rel="stylesheet" href="./css/style.css" />
    <link rel="stylesheet" href="./css/tables.css" />
    <link rel="icon" href="logo.png">
    <title>Registration | Error</title>
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
          <a href="admin-home.html">Go Home</a>
        </div>
        </fieldset>
    </main>
  </body>
</html>