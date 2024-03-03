<?php
session_start();

// Verificar si el usuario tiene una sesión válida
if (!isset($_SESSION['users'])) {
    header("Location: index.php");
    exit;
}

// Verificar el rol del usuario
if ($_SESSION['role_id'] === 1) {
    // Administrador
    header("Location: bienvenida_administrador.php");
    exit;
} elseif ($_SESSION['role_id'] === 2) {
    // Alumno
    header("Location: bienvenida_alumno.php");
    exit;
} elseif ($_SESSION['role_id'] === 3) {
    // Empresas
    header("Location: bienvenida_empresas.php");
    exit;
} else {
    // Otros roles o acceso denegado
    header("Location: acceso_denegado.php");
    exit;
}
?>