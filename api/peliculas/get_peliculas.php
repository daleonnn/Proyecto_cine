<?php
require_once "../db.php";

$stmt = $pdo->query("SELECT * FROM peliculas");
$peliculas = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($peliculas);
?>
