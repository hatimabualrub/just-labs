<?php
  session_start();
  require_once("auth.php");
  isNotAdmin();
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

    <title>Add Lab</title>
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

    <main class="row">
      <div class="card column">
        <form action="add-lab.php" method="POST">
          <h2>Add Lab</h2>
          <div class="row">
            <div class="col-2">
                <label class="control" for="line">Line Number</label>
                <input
                class="control"
                  type="text"
                  name="line"
                  id="line"
                  placeholder="Enter Line Number"
                  required
                />
            </div>
            <div class="col-1">
                <label class="control" for="section">Section</label>
                <input
                class="control full"
                  type="number"
                  name="section"
                  id="section"
                  placeholder="Enter Section"
                  required
                />
            </div>
          </div>
          <br>
          <div class="row">
          <div class="col-2">
            <label class="control" for="name">Lab Name</label>
                  <input
                  class="control "
                    type="text"
                    name="name"
                    id="name"
                    placeholder="Enter Lab Name"
                    required
                  />
          </div>
          <div class="col-1">
            <label class="control" for="code">Lab Code</label>
                  <input
                  class="control full"
                    type="text"
                    name="code"
                    id="code"
                    placeholder="Enter Code"
                    required
                  />
          </div>
          </div>
          <div class="row">
          <label class="control" for="instructor">Instructor</label>
                <input
                class="control full"
                  type="text"
                  name="instructor"
                  id="instructor"
                  placeholder="Enter Instructor Name"
                  required
                />
          </div>
          <br>
          <div class="row">
            <div class="col-1">
                <label class="control" for="day">Day</label>
                <select class="control" name="day" id="day">
                    <option value="Sun">Sun</option>
                    <option value="Mon">Mon</option>
                    <option value="Tue">Tue</option>
                    <option value="Wed">Wed</option>
                    <option value="Thur">Thur</option>
                </select>
            </div>
            <div class="col-1">
            <label class="control" for="time">Time</label>
                <select class="control" name="time" id="time">
                    <option value="8:00 - 9:00">8:00 - 9:00</option>
                    <option value="9:00 - 10:00">9:00 - 10:00</option>
                    <option value="10:00 - 11:00">10:00 - 11:00</option>
                    <option value="11:00 - 12:00">11:00 - 12:00</option>
                    <option value="12:00 - 1:00">12:00 - 1:00</option>
                    <option value="1:00 - 2:00">1:00 - 2:00</option>
                    <option value="2:00 - 3:00">2:00 - 3:00</option>
                    <option value="3:00 - 4:00">3:00 - 4:00</option>
                </select>
            </div>
          </div>
          <div class="row">
          <label class="control" for="hall">Hall</label>
                <input
                class="control full"
                  type="text"
                  name="hall"
                  id="hall"
                  placeholder="Enter Hall Name"
                  required
                />
          </div>
            <input type="submit" value="Add Lab" />
        </form>
      </div>
    </main>  
</body>
</html>
