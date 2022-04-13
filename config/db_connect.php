<?php
try {
	// On se connecte à MySQL
	// $db = new PDO('mysql:host=localhost;dbname=ensamxclub;port=3306;charset=utf8', 'root', '');
	$db = new PDO('mysql:host=remotemysql.com;dbname=01IgoC7b0n;port=3306;charset=utf8', '01IgoC7b0n', 'iKzMkhapt0');
} catch (Exception $e) {
	// En cas d'erreur, on affiche un message et on arrête tout
	die('Erreur : ' . $e->getMessage());
}
?>