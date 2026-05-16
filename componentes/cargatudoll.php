<?php
// recibir los datos por POST
$nombre = $_POST['nombre'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];
$nombrepersonaje = $_POST['nombrepersonaje'];
$tamanopersonaje = $_POST['tamanopersonaje'];
$infoextrapersonaje = $_POST['infoextrapersonaje'];

// conectar con la BD
include('conexion.php');

// enviar datos a la tabla
mysqli_query($datosBD, "INSERT INTO personaliza VALUES (DEFAULT, '$nombre', '$email', '$telefono', '$nombrepersonaje', '$tamanopersonaje', '$infoextrapersonaje')");

// redireccionar al archivo con el form
header("Location: ../personaliza.php?ok_enviado");
?>