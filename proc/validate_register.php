<?php

if ((!empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['password_conf'])) && ($_POST['password'] == $_POST['password_conf'])) {
    
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    require "../BBDD/conexion.php";

    if (!$conexion) {
        echo "ERROR DE CONEXION CON LA BASE DE DATOS";
        echo "<a href='../view/register.php'>volver</a>";
        die;
    }

    $validation_query = "SELECT id FROM tbl_usuario WHERE correo_usuario = '$email'";

    $valid_login = mysqli_query($conexion, $validation_query);

    $match = $valid_login -> num_rows;

    if ($match === 1) {

        echo "<script>window.location.href = '../view/register.php?validation=false';</script>";
        
    } elseif ($match === 0) {

        $insert_query = "INSERT INTO tbl_usuario (id, correo_usuario, contra_usuario, nombre_usuario) VALUES (NULL, '{$email}', '{$password}', '{$username}')";
        $insert_sql = mysqli_query($conexion, $insert_query);

        if ($insert_sql) {
            require "./validate_login.php";
            login($email, $password);
        } else {
            echo "NO SE HA PODIDO CREAR USUARIO";
        }

    } else {
        echo "<script>window.location.href = '../view/register.php?validation=false';</script>";
    }

} else {
    echo "<script>window.location.href = '../view/register.php?validation=false';</script>";
}