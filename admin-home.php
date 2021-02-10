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
      $operation = "<a href='toggle-registration.php' class='red'>Close Registration</a>";
    } else {
      $operation = "<a href='toggle-registration.php' class='green'>Open Registration</a>";
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

    <title>Home | Admin</title>
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
              <li><h2>Admin Account</h2></li>
          </ul>
          <a title="Log out" class="logout" href="logout.php"><i class="fa fa-sign-out"></i></a>
        </div>
      </nav>
    </header>

    <main class="column column-start">
      <fieldset class="table-card">
        <legend>Labs Schedule</legend>
        <div class="operations row row-end">
            <a href="admin-add.php">Add Lab <i class="fa fa-plus-circle"></i></a>
            <a href="#" onclick="toggle()">Delete Lab <i class="fa fa-trash"></i></a>            
            <?php echo $operation; ?>
        </div>

        <div class="course-card">
          <form class="row" action="delete-lab.php" method="POST" >
            <label for="lineNum"> Line Number</label>
            <input type="text"name="line"id="lineNum"placeholder="Enter Line Number" required/>
            <label for="section">Section</label>
            <input type="text"name="section"id="section"placeholder="Enter Section" required/>
            <input class="course-submit" type="submit" value="Delete" />
          </form>
        </div>

        <br>
        <table cellspacing="0">
          <tr>
            <th>Line Number</th>
            <th>Lab Code</th>
            <th>Lab Name</th>
            <th>Section</th>
            <th>Instructor</th>
            <th>Day</th>
            <th>Time</th>
            <th>Hall</th>
          </tr>
          <?php
       include("config.php");
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $sql = "SELECT * FROM lab";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {

            while($row = mysqli_fetch_assoc($result)) {
              echo "<tr>";
              echo "<td>". $row["line_number"]."</td>";
              echo "<td>". $row["lab_code"]."</td>";
              echo "<td>". $row["lab_name"]."</td>";
              echo "<td>". $row["section"]."</td>";
              echo "<td>". $row["instructor"]."</td>";
              echo "<td>". $row["day"]."</td>";
              echo "<td>". $row["time"]."</td>";
              echo "<td>". $row["hall"]."</td>";
              echo "</tr>";
            }
          } else {
            echo "<p class='warning'>No labs have been added yet!</p>";
          }
          mysqli_close($conn);
    ?>
        </table>
      </fieldset>
    </main>
    <script src="./js/toggle_delete.js"></script>
  </body>
</html>
