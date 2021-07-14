<?php
include "php/reset.php"; ?>

<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Grahoot</title>
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>

<!------------------------------------------- PIN / PSEUDO -->
    <main class="form-main background-bleu">
      <header class="header">
        <h1>Grahoot!</h1>
      </header>
      <div class="form">
        <section class="form-section">
          <input
            type="number"
            placeholder="Code PIN"
            id="pin"
            autocomplete="off"
          />
          <button class="pin-btn">Valider</button>
        </section>
      </div>
    </main>

<!------------------------------------------- Jquery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!------------------------------------------- JS -->
<script type="module" src="js/pin.js"></script>
  </body>
</html>
