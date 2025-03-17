<?php
require_once "../db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titulo = $_POST["titulo"];
    $descripcion = $_POST["descripcion"];
    $duracion = $_POST["duracion"];
    $genero = $_POST["genero"];
    $clasificacion = $_POST["clasificacion"];
    $poster_url = $_POST["poster_url"];

    $stmt = $pdo->prepare("INSERT INTO peliculas (titulo, descripcion, duracion, genero, clasificacion, poster_url) VALUES (?, ?, ?, ?, ?, ?)");
    
    try {
        $stmt->execute([$titulo, $descripcion, $duracion, $genero, $clasificacion, $poster_url]);
        echo json_encode(["status" => "success", "message" => "Película agregada"]);
    } catch (PDOException $e) {
        echo json_encode(["status" => "error", "message" => "Error al agregar película: " . $e->getMessage()]);
    }
}
?>
