<?php
session_start();
include "connexion.php";

$curent_que = 0;
$stmt = $pdo->prepare("SELECT * FROM verites_mensonge");
 $stmt->execute();
$post = $stmt->fetch();
echo $post->id;

?>
