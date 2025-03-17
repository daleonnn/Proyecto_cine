<?php
require_once "../../api/db.php";

$id_pelicula = $_GET["id"];
$stmt = $pdo->prepare("SELECT * FROM peliculas WHERE id_pelicula = ?");
$stmt->execute([$id_pelicula]);
$pelicula = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$pelicula) {
    die("Película no encontrada");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titulo = $_POST["titulo"];
    $descripcion = $_POST["descripcion"];
    $duracion = $_POST["duracion"];
    $genero = $_POST["genero"];
    $clasificacion = $_POST["clasificacion"];
    $poster_url = $_POST["poster_url"];

    $stmt = $pdo->prepare("UPDATE peliculas SET titulo = ?, descripcion = ?, duracion = ?, genero = ?, clasificacion = ?, poster_url = ? WHERE id_pelicula = ?");
    $stmt->execute([$titulo, $descripcion, $duracion, $genero, $clasificacion, $poster_url, $id_pelicula]);

    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Película</title>
    <link rel="stylesheet" href="../../assets/styles.css">
</head>
<body>
    <h1>Editar Película</h1>
    <form method="POST">
        <label>Título:</label>
        <input type="text" name="titulo" value="<?= $pelicula['titulo'] ?>" required>
        <label>Descripción:</label>
        <textarea name="descripcion" required><?= $pelicula['descripcion'] ?></textarea>
        <label>Duración (min):</label>
        <input type="number" name="duracion" value="<?= $pelicula['duracion'] ?>" required>
        <label>Género:</label>
        <input type="text" name="genero" value="<?= $pelicula['genero'] ?>">
        <label>Clasificación:</label>
        <input type="text" name="clasificacion" value="<?= $pelicula['clasificacion'] ?>">
        <label>URL del póster:</label>
        <input type="text" name="poster_url" value="<?= $pelicula['poster_url'] ?>">
        <button type="submit">Actualizar</button>
    </form>
    <a href="index.php">Volver</a>
</body>
</html>
