<?php
session_start();
include "connexion.php";

$stmt = $pdo->prepare(
    "SELECT * FROM `kahoot_results` ORDER BY id DESC LIMIT 1"
);
$stmt->execute();
$post = $stmt->fetch();
$pseudo = $post->nom;

$stmt = $pdo->prepare("SELECT * FROM verites_mensonge");
$stmt->execute();
$total_que = $stmt->rowCount();

$stmt = $pdo->prepare(
    "SELECT * FROM verites_mensonge WHERE id=$_GET[questionno]"
);
$stmt->execute();
$count = $stmt->rowCount();

if ($count == 0) {
    echo "over";
} else {
    $post = $stmt->fetch();
    $question_no = $post->id;
    $question = $post->nom;
    $opt1 = $post->verite_1;
    $opt2 = $post->verite_2;
    $opt3 = $post->verite_3;
    $opt4 = $post->mensonge;
}

$reponses = [$opt1, $opt2, $opt3, $opt4];
shuffle($reponses);
?>
     
    <header class="header">
        <h1>Grahoot!</h1>
    </header>
      <section class="question-section">
        <article class="timer-article">
        </article>
        <article class="question-article">
          <h2>
              <?php echo " ( " .
                  $question_no .
                  " / " .
                  $total_que .
                  " ) " .
                  $question; ?>
          </h2>
        </article>
      </section>
<section class="reponses-section" 
data-reponse0="<?php echo $reponses[0]; ?>" 
data-reponse1="<?php echo $reponses[1]; ?>"
data-reponse2="<?php echo $reponses[2]; ?>"
data-reponse3="<?php echo $reponses[3]; ?>"
data-mensonge="<?php echo $opt4; ?>">
        <article class="reponse-article rouge">
          <input type="radio" id="rep0" name="reponse" value="<?php echo $reponses[0]; ?>">
<label> <?php echo $reponses[0]; ?></label>
        </article>
        <article class="reponse-article bleu">
         <input type="radio" id="rep1" name="reponse" value="<?php echo $reponses[1]; ?>">
<label> <?php echo $reponses[1]; ?></label>
        </article>
        <article class="reponse-article jaune">
          <input type="radio" id="rep2" name="reponse" value="<?php echo $reponses[2]; ?>">
<label> <?php echo $reponses[2]; ?></label>
        </article>
        <article class="reponse-article vert">
          <input type="radio" id="rep3" name="reponse" value="<?php echo $reponses[3]; ?>">
<label> <?php echo $reponses[3]; ?></label>


        </article>
</section>
        <footer>
        <section class="footer-section">
          <h5 class="user">
            <?php echo $pseudo; ?>
          </h5>
          <h4>Score:</h4>
          <p class="score">
         
            </p>
        </section>
      </footer>

