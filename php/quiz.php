<?php
session_start();
include "connexion.php";
include "reset.php";
?>

<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Grahoot</title>
    <link rel="stylesheet" href="../style.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  </head>
  <body>
    <div class="load_questions"></div>
    <div class="tableau-scores"></div>
    <section class="btn-section">
      <button class="btn tableau-scores-btn display-none">Tableau des scores</button>
      <button class="btn next-btn display-none">Suivant</button>
  </section>
    <script src="../js/quiz.js"></script>
  </body>
</html>