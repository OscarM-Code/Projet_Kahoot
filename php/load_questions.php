<?php
include "connexion.php";
session_start();
// include "user_values.php";

/*------------------------------------------- NB DE QUESTIONS MAX */
$stmt = $pdo->prepare("SELECT * FROM verites_mensonge");
$stmt->execute();
$total_que = $stmt->rowCount();

/*------------------------------------------- QUESTION ACTUELLE */
$stmt = $pdo->prepare("SELECT * FROM verites_mensonge WHERE id=:id");
$stmt->execute(["id" => $_GET["questionno"]]);
$count = $stmt->rowCount();

$post = $stmt->fetch();
$question_no = $post->id;
$question = $post->nom;
$opt1 = $post->verite_1;
$opt2 = $post->verite_2;
$opt3 = $post->verite_3;
$opt4 = $post->mensonge;

/*------------------------------------------- SHUFFLE ARRAY */
$reponses = [$opt1, $opt2, $opt3, $opt4];
shuffle($reponses);
?>
     
    <header class="header">
        <h1>Grahoot!</h1>
    </header>
      <section class="question-section">
        <article class="timer-article">
        <h2>5</h2>
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
  data-mensonge="<?php echo $opt4; ?>"
  data-questiontotal="<?php echo $total_que; ?>">
        <article class="reponse-article rouge">
          <input type="radio" name="reponse" value="<?php echo $reponses[0]; ?>">
  <label> <?php echo $reponses[0]; ?></label>
        </article>
        <article class="reponse-article bleu">
         <input type="radio" name="reponse" value="<?php echo $reponses[1]; ?>">
  <label> <?php echo $reponses[1]; ?></label>
        </article>
        <article class="reponse-article jaune">
          <input type="radio" name="reponse" value="<?php echo $reponses[2]; ?>">
  <label> <?php echo $reponses[2]; ?></label>
        </article>
        <article class="reponse-article vert">
          <input type="radio" name="reponse" value="<?php echo $reponses[3]; ?>">
  <label> <?php echo $reponses[3]; ?></label>
        </article>
</section>
        <footer>
        <section class="footer-section">
          <h5 class="user">
            <?php echo $_SESSION["pseudo"]; ?>
          </h5>
          <h4>Score:</h4>
          <p class="score">
          </p>
        </section>
      </footer>
