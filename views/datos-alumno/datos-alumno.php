<?php

require_once '../../conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["f-perfil"]) && $_FILES["f-perfil"]["error"] == UPLOAD_ERR_OK) {
    $nombre = $_POST["nombre"];
    $ap_paterno = $_POST["ap-paterno"];
    $ap_materno = $_POST["ap-materno"];
    $matricula = $_POST["matricula"];
    $carrera = $_POST["carrera"];
    $telefono = $_POST["telefono"];
    $correo = $_POST["correo"];
    $f_perfil = file_get_contents($_FILES['f-perfil']["tmp_name"]);
    $num_imss = $_POST["num-imss"];
    $f_nacimiento = $_POST["f-nacimiento"];
    $periodo = $_POST["periodo"];
    $area = $_POST["area"];
    $cv = file_get_contents($_FILES['cv']["tmp_name"]);

     // Para guardar imagenes y archivos pdf
     $directorio_images = "./alumnoimages/$matricula";
     $directorio_pdf = "./alumnopdf/$matricula";

     $ruta_image = $directorio_images . uniqid() . '_' . basename($_FILES["f-perfil"]["name"]);
     move_uploaded_file($_FILES["f-perfil"]["tmp_name"], $ruta_image);
     
    $ruta_pdf = $directorio_pdf . uniqid() . '_' . basename($_FILES["cv"]["name"]);
    move_uploaded_file($_FILES["cv"]["tmp_name"], $ruta_pdf);

    $consulta = $conn->prepare("INSERT INTO infoalumnos (nombre, ap_paterno, 
    ap_materno, matricula, carrera, num_telefono, correo, imagen, num_imss,
    f_nacimiento, periodo_estadia, area_interes, cv) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?,
    ?, ?, ?, ?)");

    $consulta->bind_param(
        "sssssssssssss",
        $nombre,
        $ap_paterno,
        $ap_materno,
        $matricula,
        $carrera,
        $telefono,
        $correo,
        $ruta_image,
        $num_imss,
        $f_nacimiento,
        $periodo,
        $area,
        $ruta_pdf
    );

    $resultado = $consulta->execute();

    if ($resultado === TRUE) {
        echo "Los datos se han guardado correctamente";
    } else {
        echo "Error al guardar los datos: " . $conn->error;
    }

    $conn->close();
}
