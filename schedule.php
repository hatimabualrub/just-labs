<!DOCTYPE html>
  <head>
    <link rel="stylesheet" href="./css/style.css" />
    <link rel="stylesheet" href="./css/tables.css" />
    <link rel="icon" href="logo.png">
    <title>Labs Schedule</title>
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

    <main class="column column-start">
      <fieldset class="table-card">
        <legend>Labs Schedule</legend>

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
  </body>
</html>
