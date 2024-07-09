<?php
$servername = "localhost";
$username = "root"; // Tu usuario de MySQL
$password = ""; // Tu contraseña de MySQL
$dbname = "crud_db";

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
