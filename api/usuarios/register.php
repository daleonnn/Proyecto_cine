<?php
require_once "../db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $email = $_POST["email"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT); // Cifrado seguro

    $stmt = $pdo->prepare("INSERT INTO usuarios (nombre, email, contrasena) VALUES (?, ?, ?)");
    
    try {
        $stmt->execute([$nombre, $email, $password]);
        echo json_encode(["status" => "success", "message" => "Usuario registrado con éxito"]);
    } catch (PDOException $e) {
        echo json_encode(["status" => "error", "message" => "Error al registrar usuario: " . $e->getMessage()]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "Método no permitido"]);
}
?>
