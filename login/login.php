<?php
session_start();
require_once('../conexion.php'); 

$email = $_POST['email'];
$password = $_POST['password'];

// Verificar las credenciales en la base de datos
$query = "SELECT id, role_id FROM users WHERE email = '$email' AND password = '$password'";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $_SESSION['user_id'] = $row['id'];
    $_SESSION['role_id'] = $row['role_id'];
    header("Location: bienvenida.php"); 
} else {
    header("Location: index.php?error=1"); 
}
?>
