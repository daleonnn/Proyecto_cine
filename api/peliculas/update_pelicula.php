<?php
require_once "../db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_pelicula = $_POST["id_pelicula"];
    $titulo = $_POST["titulo"];
    $descripcion = $_POST["descripcion"];
    $duracion = $_POST["duracion"];
    $genero = $_POST["genero"];
    $clasificacion = $_POST["clasificacion"];
    $poster_url = $_POST["poster_url"];

    $stmt = $pdo->prepare("UPDATE peliculas SET titulo = ?, descripcion = ?, duracion = ?, genero = ?, clasificacion = ?, poster_url = ? WHERE id_pelicula = ?");
    
    try {
        $stmt->execute([$titulo, $descripcion, $duracion, $genero, $clasificacion, $poster_url, $id_pelicula]);
        echo json_encode(["status" => "success", "message" => "Película actualizada"]);
    } catch (PDOException $e) {
        echo json_encode(["status" => "error", "message" => "Error al actualizar película: " . $e->getMessage()]);
    }
}
?>
