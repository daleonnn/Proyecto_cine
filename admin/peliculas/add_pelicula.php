<?php
require_once "../../api/db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titulo = $_POST["titulo"];
    $descripcion = $_POST["descripcion"];
    $duracion = $_POST["duracion"];
    $genero = $_POST["genero"];
    $clasificacion = $_POST["clasificacion"];
    $poster_url = $_POST["poster_url"];

    $stmt = $pdo->prepare("INSERT INTO peliculas (titulo, descripcion, duracion, genero, clasificacion, poster_url) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->execute([$titulo, $descripcion, $duracion, $genero, $clasificacion, $poster_url]);

    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Añadir Película</title>
    <link rel="stylesheet" href="../../assets/styles.css">
</head>
<body>
    <h1>Añadir Nueva Película</h1>
    <form method="POST">
        <label>Título:</label>
        <input type="text" name="titulo" required>
        <label>Descripción:</label>
        <textarea name="descripcion" required></textarea>
        <label>Duración (min):</label>
        <input type="number" name="duracion" required>
        <label>Género:</label>
        <input type="text" name="genero">
        <label>Clasificación:</label>
        <input type="text" name="clasificacion">
        <label>URL del póster:</label>
        <input type="text" name="poster_url">
        <button type="submit">Guardar</button>
    </form>
    <a href="index.php">Volver</a>
</body>
</html>
