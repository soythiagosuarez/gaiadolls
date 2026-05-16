<?php
session_start();
$email = $_POST['email'];
$contrasena = $_POST['contrasena'];

include 'conexion.php';

$query = "SELECT email, contrasena FROM clientes WHERE email = '$email'";

$consultar_usuario = mysqli_query($datosBD, $query);

if (mysqli_num_rows($consultar_usuario) == 0) {
    header("Location: ../ingreso.php?usuario_inexistente");
} else {
    $separar_datos = mysqli_fetch_assoc($consultar_usuario);
    if (password_verify($contrasena, $separar_datos['contrasena'])) {
        $_SESSION['clientes'] = $email;
        header("Location: ../ingreso.php?ok_ingreso");
    } else {
        header("Location: ../ingreso.php?error_contrasena");
    }
}
?>