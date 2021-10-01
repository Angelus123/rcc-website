<?php

$pdo = new PDO('mysql:host=localhost;port=3306;dbname=mgzdhaqw_hindudb', 'mgzdhaqw_izfirst', 'qwertyuiopasdfghjklzxcvbnm');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

return $pdo;