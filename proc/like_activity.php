<?php

require "../BBDD/conexion.php";

if (!empty($_POST['act_id']) && !empty($_POST['user_id'])) {
    $act_id = $_POST['act_id'];
    $user_id = $_POST['user_id'];

    $heartcheck_query = "SELECT COUNT(1) as 'liked' FROM tbl_actividad_gustada WHERE id_usuario = {$user_id} AND id_actividad = {$act_id};";
    $heartcheck = mysqli_query($conexion, $heartcheck_query);
    $datos = mysqli_fetch_assoc($heartcheck);
    if ($datos["liked"] > 0) {
        //Borrar like
        $delete_query = "DELETE FROM tbl_actividad_gustada WHERE id_usuario = {$user_id} AND id_actividad = {$act_id};";
        $delete = mysqli_query($conexion, $delete_query);
        $update_query = "UPDATE tbl_actividad SET favs_act = favs_act - 1 WHERE id = {$act_id};";
        $update = mysqli_query($conexion, $update_query);
        echo false;
    }
    else {
        //Introducir like
        $insert_query = "INSERT INTO tbl_actividad_gustada (fecha_gustada, id_actividad, id_usuario) VALUES (NOW(), {$act_id}, {$user_id});";
        $insert = mysqli_query($conexion, $insert_query);
        $update_query = "UPDATE tbl_actividad SET favs_act = favs_act + 1 WHERE id = {$act_id};";
        $update = mysqli_query($conexion, $update_query);
        echo true;
    }
}
