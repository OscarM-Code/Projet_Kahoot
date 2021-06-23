<?php
$host = "localhost";
$user = "kahootman";
$password = "123456";
$dbname = "kahoot";
$charset = "utf8";

// Set DSN
$dsn = "mysql:host=" . $host . ";dbname=" . $dbname . ";charset=" . $charset;

// Create a PDO instance
$pdo = new PDO($dsn, $user, $password);
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

?>
