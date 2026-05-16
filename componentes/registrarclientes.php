<?php
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$email = $_POST['email'];
$contrasena = password_hash($_POST['contrasena'], PASSWORD_DEFAULT);

// conectar con la BD
include 'conexion.php';

// enviar datos a la tabla
mysqli_query($datosBD, "INSERT INTO clientes VALUES ('$nombre', '$apellido', '$email', '$contrasena')");

// redireccionar al archivo con el form
header("Location: ../ingreso.php?ok_registro");
?>