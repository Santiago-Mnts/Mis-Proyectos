<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.html");
    exit();
}

echo "Bienvenido, " . $_SESSION['username'] . "! Has Iniciado Sesión Correctamente como un " . $_SESSION['role'] . ".";
?>
