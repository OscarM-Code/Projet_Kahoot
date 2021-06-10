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
    <title>Document</title>
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>




  <div id="current_que"></div>
  <p>/</p>
  <div id="total_que"></div>
  <div id="load_questions"></div>
  <div class="tableau-scores"></div>
  <div class="timer"></div>


    <button class="btn previous-btn">previous</button>
    <button class="btn next-btn">next</button>
    <button class="btn tableau-scores-btn">tableau scores</button>
    <button class="btn remove-tableau-scores-btn">remove tableau scores</button>
    <script src="app.js"></script>
  </body>
</html>