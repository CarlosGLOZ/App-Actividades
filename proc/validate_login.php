<?php

if (!empty($_POST['email']) && !empty($_POST['password'])) {
    
    function login($email_login, $password_login) {
        require "../BBDD/conexion.php";

        if (!$conexion) {
            echo "ERROR DE CONEXION CON LA BASE DE DATOS";
            echo "<a href='../view/login.php'>volver</a>";
            die;
        }

        $query = "SELECT * FROM tbl_usuario WHERE correo_usuario = '{$email_login}' AND contra_usuario = '{$password_login}'";

        $valid_login = mysqli_query($conexion, $query);

        $match = $valid_login -> num_rows;

        if ($match === 1) {
            session_start();

            foreach ($valid_login as $key => $user) {
                $_SESSION['id_usuario'] = $user['id'];
                $_SESSION['email_usuario'] = $user['correo_usuario'];
                $_SESSION['contra_usuario'] = $user['contra_usuario'];
                $_SESSION['nombre_usuario'] = $user['nombre_usuario'];
            }

            echo "<script>window.location.href = '../view/actividades.php';</script>";
        } else {
            echo "<script>window.location.href = '../view/login.php?validation=false';</script>";
        }
    }
    
    $email = $_POST['email'];
    $password = $_POST['password'];

    login($email,$password);

} else {
    echo "<script>window.location.href = '../view/login.php?validation=false';</script>";
}