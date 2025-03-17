<?php
require_once "../db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_pelicula = $_POST["id_pelicula"];

    $stmt = $pdo->prepare("DELETE FROM peliculas WHERE id_pelicula = ?");
    
    try {
        $stmt->execute([$id_pelicula]);
        echo json_encode(["status" => "success", "message" => "Película eliminada"]);
    } catch (PDOException $e) {
        echo json_encode(["status" => "error", "message" => "Error al eliminar película: " . $e->getMessage()]);
    }
}
?>
