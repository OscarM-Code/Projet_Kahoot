/*------------------------------------------- ENVOYER LE PSEUDO */
var pseudo = "";
var pseudoInput = document.querySelector("#pseudo");
var pseudoBtn = document.querySelector(".pseudo-btn");

// valider avec la touche entrée
// pseudoInput.addEventListener("keyup", function (e) {
//   if (event.keyCode === 13) {
//     e.preventDefault();
//     pseudoBtn.click();
//   }
// });

$("form").on("submit", function (e) {
  e.preventDefault();
  $.ajax({
    url: "./php/post_pseudo.php",
    type: "POST",
    data: $(this).serialize(),
    success: function () {
      window.location = "./php/quiz.php";
    },
  });
});
