<?php
   include("config.php");
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      
        $line_number = mysqli_real_escape_string($conn,$_POST['line']);
        $section = mysqli_real_escape_string($conn,$_POST['section']); 
      
      $sql = "SELECT line_number, section FROM lab WHERE line_number = $line_number and section = $section";
      $result = mysqli_query($conn, $sql);
      if($result == FALSE){
        $errorTitle = "Invalid Input";
        $error = "Line number and Section Should be Numarical Values";
      } else {
        $count = mysqli_num_rows($result);

        if($count <= 0){
          $errorTitle = "Lab Not Found";
          $error = "This Lab Section Is Not Exist.";
        } else {
            $sql = "DELETE FROM lab WHERE line_number = '$line_number' and section = '$section'";
      
            if (mysqli_query($conn, $sql)) {
              header("location: admin-home.php");
            
            } else {
              echo "Error deleting record: " . mysqli_error($conn);
            }
        }
      }          
      mysqli_close($conn);
   }
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

    </header>
    <main>
        <fieldset class="message-card">
            <legend><?php echo $errorTitle; ?></legend>
            <br>
            <?php echo "<p class='warning'>$error</p>"; ?>
            <div class="operations row row-end">
          <a href="admin-home.php">Back To Home</a>
        </div>
        </fieldset>
    </main>
  </body>
</html>
