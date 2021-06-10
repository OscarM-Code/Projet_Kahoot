<?php
session_start();
include "connexion.php";

$correct = 0;
$wrong = 0;

if (isset($_SESSION["answer"])) {
    $stmt = $pdo->prepare("SELECT * FROM verites_mensonge");
    $stmt->execute();
    $maxcount = $stmt->rowCount();

    for ($i = 1; $i <= sizeof($_SESSION["answer"]); $i++) {
        $answer = "";
        $stmt = $pdo->query("SELECT * FROM mensonges WHERE id = $i");
        $post = $stmt->fetch();
        $answer = $post->mensonge;

        if (isset($_SESSION["answer"][$i])) {
            if ($answer == $_SESSION["answer"][$i]) {
                $correct = $correct + 1;
            } else {
                $wrong = $wrong + 1;
            }
        }
    }
}
$count = 0;
$stmt = $pdo->prepare("SELECT * FROM verites_mensonge");
$stmt->execute();
$count = $stmt->rowCount();

$wrong = $count - $correct;

?>


<p class="tableau-scores-p">
    <?php
        echo "correct " . $correct;
    ?>
</p>

<?php
// echo "wrong " . $wrong;

//   $stmt = $pdo->prepare("INSERT INTO kahoot_results(id, nom, total_question, correct_answer, wrong_answer) VALUES(:id, :nom, :total_question, :correct_answer, :wrong_answer)");
//   $stmt->execute(['id' => NULL, 'nom' => '', 'total_question' => $count, 'correct_answer' => $correct, 'wrong_answer' => $wrong]);
//   echo 'Post Added';

?>

