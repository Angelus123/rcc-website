<?php
	// $conn = mysqli_connect("localhost","iz","cri11ern","payload");
$pdo = new PDO('mysql:host=localhost;port=3306;dbname=payload', 'iz', 'cri11ern');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

return $pdo;