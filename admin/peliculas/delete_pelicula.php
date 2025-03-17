<?php
require_once "../../api/db.php";

if (isset($_GET["id"])) {
    $id_pelicula = $_GET["id"];
    $stmt = $pdo->prepare("DELETE FROM peliculas WHERE id_pelicula = ?");
    $stmt->execute([$id_pelicula]);
}

header("Location: index.php");
exit;
?>
