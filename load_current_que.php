<?php
session_start();
include "connexion.php";

$curent_que=0;
$stmt = $pdo->query('SELECT * FROM verites_mensonge');
$post = $stmt->fetch();
echo $post->id;

?>