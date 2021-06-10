<?php
session_start();
include "connexion.php";

$total_que = 0;
$stmt = $pdo->prepare("SELECT * FROM verites_mensonge");
$stmt->execute();
$total_que = $stmt->rowCount();
echo $total_que;

?>
