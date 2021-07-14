<?php
include "connexion.php";
session_start();

// NE PEUX PAS ALLER SUR LE QUIZ SANS PSEUDO
if (isset($_SESSION["pseudo"]) && $_SESSION["pseudo"] != "") {
} else {
    header("location:../../projet_grahoot");
}
?>

<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Grahoot</title>
    <link rel="stylesheet" href="../style.css" />
  </head>
  <body>
    <div class="load-questions" style="display: none;"></div>
    <div class="tableau-scores" style="display: none;"></div>
    <section class="btn-section">
      <button class="btn tableau-scores-btn display-none">Tableau des scores</button>
      <button class="btn next-btn display-none">Suivant</button>
    </section>
<!------------------------------------------- Jquery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!------------------------------------------- JS -->
<script src="../js/quiz.js"></script>
  </body>
</html>

