<?php
require_once '../conexion.php';

// Procesar datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $matricula = $_POST["matricula"];
    $email = $_POST["email"];
    $contrasenia = $_POST["contrasenia"];

    // Verificar si la matrícula ya existe en la base de datos
    $sql_check = "SELECT matricula FROM alumnos WHERE matricula = '$matricula'";
    $result_check = $conn->query($sql_check);

    if ($result_check->num_rows > 0) {
        echo "La matrícula ya está registrada en la base de datos.";
        exit(); // Salir del script
    }

    // La matrícula no está duplicada, proceder con la inserción
    $passencrypt = password_hash($contrasenia, PASSWORD_DEFAULT);

    // Insertar datos en la tabla de usuarios
    $sql = "INSERT INTO alumnos (matricula, correo, contrasenia) VALUES ('$matricula', '$email', '$passencrypt')";

    if ($conn->query($sql) === TRUE) {
        echo "Usuario registrado exitosamente";
        header("Location: ../index.php");
        exit();
    } else {
        echo "Error al registrar usuario: " . $conn->error;
        header("Location: ../registro.php");
        exit();
    }
}

$conn->close();