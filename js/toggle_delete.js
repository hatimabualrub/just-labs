const form = document.querySelector(".course-card");
form.style.display = "none";
let show = false;

function toggle() {
  if (show) {
    form.style.display = "none";
  } else {
    form.style.display = "flex";
  }
  show = !show;
}
