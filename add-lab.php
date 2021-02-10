<?php
   include("config.php");
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      
      $line_number = mysqli_real_escape_string($conn,$_POST['line']);
      $section = mysqli_real_escape_string($conn,$_POST['section']); 
      $lab_name = mysqli_real_escape_string($conn,$_POST['name']);
      $lab_code = mysqli_real_escape_string($conn,$_POST['code']);
      $instructor = mysqli_real_escape_string($conn,$_POST['instructor']);
      $day = mysqli_real_escape_string($conn,$_POST['day']);
      $time = mysqli_real_escape_string($conn,$_POST['time']);
      $hall = mysqli_real_escape_string($conn,$_POST['hall']);

      $sql = "SELECT * FROM lab WHERE line_number = $line_number and section = $section";      
      $result = mysqli_query($conn,$sql);
      if($result == FALSE){
        $errorTitle = "Invalid Input";
        $error = "Invalid Lab Information Try Another Valid One.";
      } else {
        $count = mysqli_num_rows($result);

        if($count >= 1){
          $errorTitle = "Lab Already Exist";
          $error = "The Entered Line Number and Section is Already Exist.";
        } else {
            $sql = "INSERT INTO lab (`line_number`, `lab_code`, `lab_name`, `section`, `instructor`, `day`, `time`, `hall`) VALUES ('$line_number', '$lab_code', '$lab_name', '$section', '$instructor', '$day', '$time', '$hall')";
            if (mysqli_query($conn, $sql)) {
               header("location: admin-home.php");
               exit();
             } else {
               echo "Error: " . $sql . "<br>" . mysqli_error($conn);
             }
       }

      }


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
        </nav>
    </header>
    <main>
        <fieldset class="message-card">
            <legend><?php echo $errorTitle; ?></legend>
            <br>
            <?php echo "<p class='warning'>$error</p>"; ?>
            <div class="operations row row-end">
                <a href="admin-add.php">Retry Again</a>
            </div>
        </fieldset>
    </main>
  </body>
</html>

