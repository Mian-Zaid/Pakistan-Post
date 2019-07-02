function myFunction() {
  // Get the checkbox
  var checkBox = document.getElementById("myCheck");
  // Get the output text
  var check = document.getElementById("insurance-details");

  // If the checkbox is checked, display the output text
  if (checkBox.checked == true){
    check.style.display = "block";
  } else {
    check.style.display = "none";
  }
}

function myFunction2() {
  // Get the checkbox
  var checkBox = document.getElementById("check");
  // Get the output text
  var check = document.getElementById("forgot-id");

  // If the checkbox is checked, display the output text
  if (checkBox.checked == true){
    check.style.display = "block";
  } else {
    check.style.display = "none";
  }
}