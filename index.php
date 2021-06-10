<?php
session_start();
include "connexion.php";
include "reset.php";
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Grahoot</title>
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <div id="load_questions"></div>
    <div class="tableau-scores"></div>
    <section class="btn-section">
      <button class="btn tableau-scores-btn display-none">Tableau des scores</button>
      <button class="btn next-btn display-none">Suivant</button>
  </section>
    <script src="app.js"></script>
  </body>
</html>