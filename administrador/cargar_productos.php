<?php
$id_prod = $_POST['id'];
$nombre_prod = $_POST['nombre'];
$categoria_prod = $_POST['categoria'];
$tamanopersonaje_prod = $_POST['tamanopersonaje'];
$precio_prod = $_POST['precio'];

// nombre del archivo, formato, peso, espacio temporal //
$imagen_nombre = $_FILES['imagen']['name'];
$imagen_tipo = $_FILES['imagen']['type'];
$imagen_peso = $_FILES['imagen']['size'];
$imagen_tmp = $_FILES['imagen']['tmp_name'];

// verificar formato image/jpeg, image/gif, image/png
// verificar peso no sea mayor 195KB (200000)

if($imagen_tipo != 'image/jpeg' && $imagen_tipo != 'image/gif' && $imagen_tipo != 'image/png') {
    header('Location: index.php?error_formato');
} elseif ($imagen_peso > 200000) {
    header('Location: index.php?error_peso');
} else {
    // conectar con la BD
    include('../componentes/conexion.php');
    $cod_imagen = fopen($imagen_tmp, "r+");
    $cod_imagen_cont = fread($cod_imagen, $imagen_peso);
    $cod_imagen_table = addslashes($cod_imagen_cont);
    // enviar datos a la tabla
    mysqli_query($datosBD, "INSERT INTO productos VALUES ($id_prod, '$nombre_prod', '$categoria_prod', '$tamanopersonaje_prod', $precio_prod, '$cod_imagen_table', '$imagen_tipo')");
    header("Location: index.php?ok_carga");
}
?>