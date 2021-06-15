<?php
include "connexion.php";

if (isset($_POST["pseudo"])) {
    $pseudo = $_POST["pseudo"];
    $stmt = $pdo->prepare(
        "INSERT INTO kahoot_results(id, nom, total_question, correct_answer, wrong_answer) VALUES(:id, :nom, :total_question, :correct_answer, :wrong_answer)"
    );
    $stmt->execute([
        "id" => null,
        "nom" => $pseudo,
        "total_question" => "",
        "correct_answer" => "",
        "wrong_answer" => "",
    ]);
    echo $result = 1;
}

?>
