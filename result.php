<?php
include "connexion.php";

$stmt = $pdo->prepare(
    "SELECT * FROM `kahoot_results` ORDER BY id DESC LIMIT 1"
);
$stmt->execute();
$post = $stmt->fetch();
$pseudo = $post->nom;
?>
      


      <nav class="nav">
        <h2>Tableau des scores</h2>
      </nav>
      <header class="header">
        <h1>Grahoot!</h1>
      </header>
      <section class="tableau-scores-section">
        <article class="tableau-score-article">
            <h4>1</h4>
            <h5>
              <?php echo $pseudo; ?>
            </h5>
            <p class="score"></p>
      </section>
