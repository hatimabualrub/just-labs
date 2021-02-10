<?php
   session_start();
   include("config.php");
   require_once("auth.php");
   isNotStudent();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      
      $course_id = mysqli_real_escape_string($conn,$_POST['lineNum']);
      $section = mysqli_real_escape_string($conn,$_POST['section']); 
      $student_id = $_SESSION['studentId'];
      

      $sql = "SELECT * FROM lab WHERE line_number = $course_id and section = $section";      
      $result = mysqli_query($conn,$sql);
      if($result == FALSE){
        $errorTitle = "Invalid Input";
        $error = "Line number and Section Should be Numarical Values";
      } else {
        $count = mysqli_num_rows($result);

        if($count <= 0){
          $errorTitle = "Lab Not Found";
          $error = "Lab Not Found. The Entered Lab Section Is Not Exist.";
        } else {
          $sql = "SELECT student_id, course_id FROM enroll WHERE student_id = '$student_id' and course_id = '$course_id'";
          $result = mysqli_query($conn,$sql);
          $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
          
          $count = mysqli_num_rows($result);
          
            
          if($count == 1) {
            $errorTitle = "Lab Is Already Registered";
            $error = "The Entered Lab Is Already Registered.";
          }else {
             $sql = "INSERT INTO enroll (course_id, student_id, section) VALUES ($course_id, $student_id, $section)";
             if (mysqli_query($conn, $sql)) {
                header("location: home.php");
              } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
              }
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
    <title>error</title>
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
                <a href="home.php">Back To Home</a>
            </div>
        </fieldset>
    </main>
  </body>
</html>

