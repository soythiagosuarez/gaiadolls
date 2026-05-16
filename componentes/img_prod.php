<?php
include('conexion.php');
$id = $_GET['id'];
$consultar_img = mysqli_query($datosBD, "SELECT formato, imagen FROM productos WHERE id = $id");
$separar_datos = mysqli_fetch_row($consultar_img);
header("Content-type: $separar_datos[0]");
echo $separar_datos[1];
?>