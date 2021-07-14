/*------------------------------------------- PIN */
var pinAdmin = 1234;
var pinCode = Math.floor(Math.random() * 10000000);
console.log(pinCode);
var pin = 0;
var pinInput = document.querySelector("#pin");

// valider avec la touche entrée
$("#pin").keyup(function (event) {
  if (event.keyCode === 13) {
    $(".pin-btn").click();
  }
});

$(document).ready(function () {
  $(".pin-btn").click(function () {
    pin = pinInput.value;
    if (pin == pinCode || pin == pinAdmin) {
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
