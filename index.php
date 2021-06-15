<?php
include "php/reset.php";
include "php/connexion.php";
?>

<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Grahoot</title>
    <link rel="stylesheet" href="style.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  </head>
  <body>
    <main class="pin-main background-bleu">
      <header class="header">
        <h1>Grahoot!</h1>
      </header>
      <div class="form">
        <section class="pin-section">
          <input
            type="number"
            placeholder="Code PIN"
            id="pin"
            autocomplete="off"
          />
          <button class="pin-btn">Valider</button>
        </section>
        <script src="js/pin.js"></script>
      </div>
    </main>
  </body>
</html>
