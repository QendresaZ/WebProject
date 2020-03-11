<?php
	try {
		$pdo = new PDO("mysql:host=localhost;dbname=webprojekti", "root", "27111997");
	} catch (PDOException $e) {
		$e->getMessage();
	}
?>