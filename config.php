<?php
session_start();

global $pdo;
try {
	$pdo = new PDO("mysql:dbname=banco;host=localhost", "root", "");
} catch(PDOException $e) {
	echo "FALHOU: ".$e->getMessage();
	exit;
}
?>