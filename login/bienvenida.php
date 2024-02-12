<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit;
}

$role_id = $_SESSION['role_id'];

// Mostrar contenido específico según el rol
if ($role_id == 1) {
    echo "Bienvenido, Administrador";
} elseif ($role_id == 2) {
    echo "Bienvenido, Empresa";
} elseif ($role_id == 3) {
    echo "Bienvenido, Alumno";
}
?>
