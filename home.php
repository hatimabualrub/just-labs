<?php
    session_start();
    require_once("auth.php");
    isNotStudent();
    include("config.php");

    $sql = "SELECT open_registration FROM admin WHERE email = 'admin@admin.com'";
    $result = mysqli_query($conn,$sql);
    if($result){
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $state = $row['open_registration'];
      if($state == 1) {
        $operation = "<a href='#' onclick='methodToggle(true)'>Register Lab</a>";
      } else {
        $operation = "<a href='#' onclick='alert(\"The Registration Process is Closed Right Now!\")' class='red'>Register Lab</a>";
      }
    }
?>
<!DOCTYPE html>
  <head>
    <link rel="stylesheet" href="./css/style.css" />
    <link rel="stylesheet" href="./css/tables.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <link rel="icon" href="logo.png">

    <title>Home</title>
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
        <div class="row">
          <ul class="nav-links column">
          <?php
              echo "<li><h2>". $_SESSION["name"] ."</h2></li>";
              echo "<li><h2>". $_SESSION["studentId"] ."</h2></li>";
          ?>
          </ul>
          <a title="Log out" class="logout" href="logout.php"><i class="fa fa-sign-out"></i></a>
        </div>
      </nav>
    </header>
    <main class="column column-start">
      <fieldset class="table-card">
        <legend>Last Registered Labs</legend>
        <div class="operations row row-end">
          <a href="#" onclick="methodToggle(false)">Drop Lab</a>
          <?php echo $operation; ?>
          <a href="schedule.php" target="_blank">Labs Schedule</a>
        </div>
        <div class="course-card"></div>


        <?php
            include("config.php");
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }
            $sql = "SELECT course_id, section FROM enroll WHERE student_id=$_SESSION[studentId]";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                echo '<table cellspacing="0"><tr>';
                echo '<th>Line Number</th>';
                echo '<th>Lab Code</th>';
                echo '<th>Lab Name</th>';
                echo '<th>Section</th>';
                echo '<th>Instructor</th>';
                echo '<th>Day</th>';
                echo '<th>Time</th>';
                echo '<th>Hall</th></tr>';

                while($row = mysqli_fetch_assoc($result)) {
                    $sql2 = "SELECT * FROM lab WHERE line_number=$row[course_id] and section=$row[section]";
                    $result2 = mysqli_query($conn, $sql2);
                    $row2 = mysqli_fetch_assoc($result2);
                    echo "<tr>";
                    echo "<td>". $row2["line_number"]."</td>";
                    echo "<td>". $row2["lab_code"]."</td>";
                    echo "<td>". $row2["lab_name"]."</td>";
                    echo "<td>". $row2["section"]."</td>";
                    echo "<td>". $row2["instructor"]."</td>";
                    echo "<td>". $row2["day"]."</td>";
                    echo "<td>". $row2["time"]."</td>";
                    echo "<td>". $row2["hall"]."</td>";
                    echo "</tr>";                        
                }
                echo "</table>";
                echo "<h1>Total Registerd Houres: ". mysqli_num_rows($result)."</h1>";
              } else {
                echo '<p class="warning">You are not registered in any course yet</p>';
              }

              mysqli_close($conn);
        ?>

      </fieldset>
    </main>
    <script src="./js/toggle_method.js"></script>
  </body>
</html>
