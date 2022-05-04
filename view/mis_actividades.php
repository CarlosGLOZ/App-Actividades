<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis Actividades</title>
</head>
<body>
    <!-- PRIMERO COMPROBAR QUE LA URL ESTÁ CORRECTA -->
    <?php
        if (!isset($_GET['author'])) {
            echo "<script>window.location.href = './actividades.php';</script>";
        } else {?>

    <!-- HACER UNA QUERY PARA RECOGER LAS ACTIVIDADES CUYO AUTOR SEA EL USUARIO DEL GET -->
    <?php 
        require "../BBDD/conexion.php";

        $act_query = "SELECT * FROM tbl_actividad WHERE autor_act = ".$_GET['author'];
        $actividades = mysqli_query($conexion, $act_query);

        foreach ($actividades as $key => $actividad) {
            echo "-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------<br>";

            // HACER UNA QUERY PARA RECOGER LOS DATOS DEL AUTOR DE LA ACTIVIDAD
            $author_query = "SELECT * from tbl_usuario where id = ".$actividad['autor_act'].";";
            $author_request = mysqli_query($conexion, $author_query);

            $author = mysqli_fetch_array($author_request);
            $id_autor = $author['id'];
            $nombre_autor = $author['nombre_usuario']; 

            // MOSTRAR DATOS DE LA ACTIVIDAD
            $nombreArchivo = explode("/",$actividad['foto_act'])[8];
            $ruta = "../img/actividades/".$nombreArchivo;

            echo "NOMBRE: ".$actividad['nombre_act']."<br><br>";
            echo "TEMA: ".$actividad['tema_act']."<br><br>";
            echo "DESCRIPCIÓN: ".$actividad['desc_act']."<br><br>";
            echo "AUTOR: <a href='./mis_actividades.php?author={$id_autor}'>{$nombre_autor}</a><br><br>";
            echo "<img src='".$ruta."' alt='".$actividad['nombre_act']."'><br><br>";
        }
    }
    ?>
</body>
</html>