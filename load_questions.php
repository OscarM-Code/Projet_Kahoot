<?php
session_start();
include "connexion.php";

$question_no = "";
$question = "";
$opt1 = ";";
$opt2 = ";";
$opt3 = ";";
$opt4 = ";";
$answer = "";
$count = 0;
$ans = "";

$total_que = 0;
$stmt = $pdo->prepare("SELECT * FROM verites_mensonge");
$stmt->execute();
$total_que = $stmt->rowCount();

$queno = $_GET["questionno"];

if (isset($_SESSION["answer"][$queno])) {
    $ans = $_SESSION["answer"][$queno];
}

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
<section class="reponses-section">
        <article class="reponse-article rouge">
          <input type="radio" name="reponse" value="<?php echo $reponses[0]; ?>" onclick="radioClick(this.value,<?php echo $question_no; ?>)"
<?php if ($ans == $reponses[0]) {
    echo "checked";
} ?>>
<label> <?php echo $reponses[0]; ?></label>
        </article>
        <article class="reponse-article bleu">
         <input type="radio" name="reponse" value="<?php echo $reponses[1]; ?>" onclick="radioClick(this.value,<?php echo $question_no; ?>)"
<?php if ($ans == $reponses[1]) {
    echo "checked";
} ?>>
<label> <?php echo $reponses[1]; ?></label>
        </article>
        <article class="reponse-article jaune">
          <input type="radio" name="reponse" value="<?php echo $reponses[2]; ?>" onclick="radioClick(this.value,<?php echo $question_no; ?>)"
<?php if ($ans == $reponses[2]) {
    echo "checked";
} ?>>
<label> <?php echo $reponses[2]; ?></label>
        </article>
        <article class="reponse-article vert">
          <input type="radio" name="reponse" value="<?php echo $reponses[3]; ?>" onclick="radioClick(this.value,<?php echo $question_no; ?>)"
<?php if ($ans == $reponses[3]) {
    echo "checked";
} ?>>
<label> <?php echo $reponses[3]; ?></label>

        </article>
</section>
        <footer>
        <section class="footer-section">
          <h5 class="user">
              BOB
          </h5>
          <!-- <h4>Score:</h4>
          <p class="score">

            </p> -->
        </section>
      </footer>
