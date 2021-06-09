<?php 
session_start();
include "connexion.php";
include "reset.php"

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
<h2>/</h2>
  <div id="total_que"></div>
  <div id="load_questions"></div>


    <button class="btn btn-previous">previous</button>
    <button class="btn btn-next">next</button>
    <!-- <input class="btn" type="button" value="Next" onclick="load_next();" /> -->
    <script src="app.js"></script>

    <?php 
    
        //  $stmt = $pdo->query("SELECT * FROM mensonges WHERE id = 1");
        // $post = $stmt->fetch();
        // $answer = $post->mensonge;
        // echo $answer;
    
    ?>
  </body>
</html>