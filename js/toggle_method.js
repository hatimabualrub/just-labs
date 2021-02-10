const formBox = document.querySelector(".course-card");
const registerForm =
  ' <form class="row" action="register.php" method="POST" ><label for="lineNum"> Line Number</label><input type="text"name="lineNum"id="lineNum"placeholder="Enter Line Number" required/><label for="section">Section</label><input type="text"name="section"id="section"placeholder="Enter Section" required/><input class="course-submit" type="submit" value="Register" /></form>';
const dropForm =
  ' <form class="row" action="drop.php" method="POST" ><label for="lineNum"> Line Number</label><input type="text"name="lineNum"id="lineNum"placeholder="Enter Line Number" required/><label for="section">Section</label><input type="text"name="section"id="section"placeholder="Enter Section" required/><input class="course-submit" type="submit" value="Drop" /></form>';

function methodToggle(isRegister) {
  if (isRegister) {
    formBox.innerHTML = registerForm;
  } else {
    formBox.innerHTML = dropForm;
  }
}
