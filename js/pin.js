/*------------------------------------------- PIN */
var pinCode = Math.floor(Math.random() * 10000000);
console.log(pinCode);
var pinInput = 0;
var pinAdmin = 1234;

$(document).ready(function () {
  $(".pin-btn").click(function () {
    pinInput = document.querySelector("#pin").value;
    if (pinCode == pinInput || pinInput == pinAdmin) {
      $.ajax({
        success: function () {
          $(".form").load("./php/pseudo.php");
        },
      });
    } else {
      alert("Mauvais code PIN");
    }
  });
});
