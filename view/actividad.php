<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actividad</title>
   
</head>
<body>
    <?php
        if (!empty($_GET['act'])) {
            require "../BBDD/conexion.php";

            $check_query = "SELECT * FROM tbl_actividad WHERE id = {$_GET['act']}";
            $check_request = mysqli_query($conexion, $check_query);

            
            if ($check_request->num_rows == 1) {
                
                // SI LA QUERY DEVUELVE UN RESULTADO, MOSTRAR DATOS DE LA ACTIVIDAD
                $actividad = mysqli_fetch_array($check_request);

                // BUSCAR AUTOR DE LA ACTIVIDAD
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

            } else {
                echo "<script>window.location.href = './actividades.php';</script>";
            }
        } else {
            echo "<script>window.location.href = './actividades.php';</script>";
        }
    ?>
</body>
</html>