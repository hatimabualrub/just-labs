<?php
   session_start();
   include("config.php");
   require_once("auth.php");
   isNotStudent();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      
      $course_id = mysqli_real_escape_string($conn,$_POST['lineNum']);
      $section = mysqli_real_escape_string($conn,$_POST['section']); 
      $student_id = $_SESSION['studentId'];
      
      $sql = "SELECT student_id, course_id FROM enroll WHERE student_id = $student_id and course_id = $course_id";
      $result = mysqli_query($conn, $sql);
      if($result == FALSE){
        $errorTitle = "Invalid Input";
        $error = "Line number and Section Should be Numarical Values";
      } else {
        $count = mysqli_num_rows($result);

        if($count <= 0){
          $errorTitle = "Lab Not Registered";
          $error = "You Are Not Registered To This Lab Section.";
        } else {
            $sql = "DELETE FROM enroll WHERE student_id = '$student_id' and course_id = '$course_id'";
      
            if (mysqli_query($conn, $sql)) {
              header("location: home.php");
            
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
          <a href="home.php">Back To Home</a>
        </div>
        </fieldset>
    </main>
  </body>
</html>
