<?php
require_once "../db.php";

if (!isset($_GET["id_pelicula"])) {
    echo json_encode(["status" => "error", "message" => "ID de película requerido"]);
    exit;
}

$id_pelicula = $_GET["id_pelicula"];

$stmt = $pdo->prepare("SELECT * FROM peliculas WHERE id_pelicula = ?");
$stmt->execute([$id_pelicula]);
$pelicula = $stmt->fetch(PDO::FETCH_ASSOC);

if ($pelicula) {
    echo json_encode($pelicula);
} else {
    echo json_encode(["status" => "error", "message" => "Película no encontrada"]);
}
?>
