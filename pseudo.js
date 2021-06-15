/*------------------------------------------- PSEUDO */

$("form").on("submit", function (e) {
  e.preventDefault();
  $("form").html();
  $.ajax({
    url: "getpseudo.php",
    type: "POST",
    data: $(this).serialize(),
    success: function (result) {
      if (result == 0) {
        console.log("pas good");
      } else {
        window.location = "quiz.php";
      }
    },
  });
});
