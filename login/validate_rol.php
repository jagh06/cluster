<?php
session_start();
$roles_permitidos = ['Administrador', 'Empresas', 'Alumnos'];
if(!array_key_exists('rol', $_SESSION) || !in_array($_SESSION['roles'], $roles_permitidos)){
    header("Location: bienvenida.php");
}
?>