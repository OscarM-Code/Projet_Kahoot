/*------------------------------------------- PIN */
var pinCode = Math.floor(Math.random() * 10000000);
console.log(pinCode);

var pinInput = 0;
$(document).ready(function () {
  $(".pin-btn").click(function () {
    pinInput = document.querySelector("#pin").value;
    if (pinCode == pinInput) {
      $.ajax({
        success: function (result) {
          $(".form").load("pseudo.php");
        },
      });
    } else {
      alert("Mauvais code PIN");
    }
  });
});
