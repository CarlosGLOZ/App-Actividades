<?php
session_start();

if (!empty($_SESSION['email_usuario'])) {
    if (!empty($_POST['nombre_actividad']) && !empty($_FILES['foto_actividad'])) {
        
        $nombre_actividad = $_POST['nombre_actividad'];
        $desc_actividad = $_POST['desc_actividad'];
        $tema_actividad = $_POST['tema_actividad'];
        $autor_actividad = $_POST['autor_actividad'];
        $foto_actividad = $_FILES['foto_actividad'];
        if (isset($_POST['visibilidad_actividad'])) {
            $visibilidad_actividad = "privada";
        } else {
            $visibilidad_actividad = "publica";
        }

        require "../BBDD/conexion.php";

        $last_insert_query = "SELECT MAX(id) FROM tbl_actividad;";
        $last_insert_request = mysqli_query($conexion, $last_insert_query);
        $last_insert_array = mysqli_fetch_array($last_insert_request);
        $last_insert_id = $last_insert_array['MAX(id)'] +1;

        $id_usuario_autor = $_SESSION['id_usuario'];

        $path = "/www/M4-Lenguaje de Marcas/App-Actividades/img/actividades/";
        $pathRel = "../img/actividades/";
        $tipo = explode('/',$foto_actividad['type']);
        $nombre_foto = $id_usuarioautor."".$last_insert_id.".".$tipo[1];
        $destinoLocal = $pathRel.$nombre_foto;
        $destinoRed = "http://".$_SERVER['SERVER_NAME'].$path.$nombre_foto;

        if (($foto_actividad['size'] < 1920*1080) && ($foto_actividad['type'] == 'image/png' || $foto_actividad['type'] == 'image/jpeg' || $foto_actividad['type'] == 'image/gif')) {
            $exito = move_uploaded_file($foto_actividad['tmp_name'], $destinoLocal);
            
            if ($exito) {
                
                $act_insert_query = "INSERT INTO tbl_actividad (nombre_act, desc_act, foto_act, tema_act, fecha_public_act, visibilidad_act, link_act, autor_act, favs_act) VALUES ('$nombre_actividad', '$desc_actividad', '$destinoLocal', '$tema_actividad', NOW(), '$visibilidad_actividad', '../view/actividad.php?act={$last_insert_id}', '$id_usuario_autor', 0);";
                $act_insert_request = mysqli_query($conexion, $act_insert_query);

                if ($act_insert_request) {
                    echo "<script>window.location.href = '../view/actividad.php?act={$last_insert_id}';</script>";
                } else {
                    echo "<script>window.location.href = '../view/subir_actividad.php?val=\"insert_error\"';</script>";
                }

            } else {
                echo "<script>window.location.href = '../view/subir_actividad.php?val=\"upload_error\"';</script>";
            }
        } else {
            echo "<script>window.location.href = '../view/subir_actividad.php?val=\"img_error\"';</script>";
        }
        
    } else {
        echo "<script>window.location.href = '../view/subir_actividad.php?val=\"field_error\"';</script>";
    }
} else {
    echo "<script>window.location.href = '../view/login.php';</script>";
}