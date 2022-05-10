<?php

require "../BBDD/conexion.php";

if (!empty($_POST['act_id']) && !empty($_POST['user_id'])) {~
    $act_id = $_POST['act_id']
    $user_id = $_POST['user_id']

    $liked_act_query = "INSERT INTO tbl_actividad_gustada (fecha_gustada, id_actividad, id_usuario) VALUES (CURDATETIME(), {$act_id}, {$user_id});";
    $liked_act_request = mysqli_query($conexion, $liked_act_query);
    mysqli_free_result($liked_act_request);
}