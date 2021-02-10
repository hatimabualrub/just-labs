<?php
  session_start();
  require_once("auth.php");
  isStudent();
  isAdmin();
?>
<!DOCTYPE html>
  <head>
    <link rel="stylesheet" href="./css/style.css" />
    <link rel="stylesheet" href="./css/tables.css" />
    <link rel="icon" href="logo.png">
    <title>JUST LAB</title>
  </head>
  <body>
    <header>
      <nav class="row">
        <div class="row">
          <img class="logo-image" src="logo.png" alt="" />
          <h1 class="logo">JUST LAB</h1>
        </div>

        <ul class="nav-links row">
          <li>
            <a href="login.html">Log in</a>
          </li>
          <li>
            <a href="signup.html">Sign up</a>
          </li>
        </ul>
      </nav>
    </header>
    <main class="form-page cover">
      <fieldset class="table-card column cover">
        <legend>Welcome To JUST LAB</legend>
        <h1 class="description">What is JUST LAB ?</h1>
        <p class="description">
          JUST LAB is an online platform provided by Jordan University of
          Science and Technology to manage labs online registration process.
        </p>
        <h1 class="description">How to Register Labs?</h1>
        <p class="description">
          All available Lab Sections are listed in the labs schedule Table where
          you can get the Line Number and Section of the Lab that you want to
          register. Then you can register the lab from student main screen.
        </p>
        <br />
        <br />

        <!-- <h1 class="description">How to Start?</h1>
        <p class="description">
          You can start using <strong>JUST LAB</strong> just by creating an
          account after you provide valid information about you, Like your
          Student ID and Name.
        </p> -->
        <div class="operations row row-end">
          <a href="signup.html">Create Account</a>
          <a href="admin-login.html">Login as Admin</a>
        </div>
      </fieldset>
      <br />
    </main>
  </body>
</html>
