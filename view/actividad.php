<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actividad</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/actividad.css">
    <script src="https://kit.fontawesome.com/e0b63cee0f.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="../js/likeActivity.js"></script>
</head>
<body>

<!-- nav -->

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="../index.html">#AppName</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarScroll">
            <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 50vh;">
                <li class="nav-item">
                    <a class="nav-link" href="./nosotros.php">Sobre nosotros</a>

                </li>

                <li class="nav-item">
                    <a class="nav-link"  href="./actividades.php">Actividades</a>
                </li>
            </ul>
            <form class="d-flex">
                <!-- <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"> -->
            <?php
            session_start();

            // MODIFICAR NAVBAR SEGÚN SI EL USUARIO ESTÁ LOGEADO O NO
            if (isset($_SESSION['nombre_usuario'])) {
                echo "<button class='btn btn-light form-control me-1' type='button' onclick='window.location.href = \"./subir_actividad.php\"'><i class='fa-solid fa-arrow-up-from-bracket'></i></button>";
                echo "<button class='btn btn-light form-control ms-1' type='button' onclick='window.location.href = \"./mis_actividades.php\"'>{$_SESSION['nombre_usuario']}</button>";
                echo "<button class='btn btn-light form-control ms-1' type='button' onclick='window.location.href = \"../proc/logout.php\"'>LogOut</button>";
                
            }else {
                echo "<button class='btn btn-light form-control me-1' type='button' onclick='window.location.href = \"./subir_actividad.php\"'><i class='fa-solid fa-arrow-up-from-bracket'></i></button>";
                echo "<button class='btn btn-light form-control ms-1' type='button' onclick='window.location.href = \"./login.php\"'>ACCEDER</button>";
                
            }
            
            ?>
                
            </form>
        </div>
    </div>
</nav>


    <?php

        if (!empty($_GET['act'])) {
            require "../BBDD/conexion.php";

            // HACER UNA QUERY PARA LA ACTIVIDAD EN CONCRETO 
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

                $likes_query = "SELECT count(id) as 'likes' FROM tbl_actividad_gustada WHERE id_actividad=".$actividad['id'].";";
                $likes_request = mysqli_query($conexion, $likes_query);
                $likes_actividad = mysqli_fetch_array($likes_request)['likes']; 
                
                // MOSTRAR DATOS DE LA ACTIVIDAD
                $ruta = $actividad['foto_act'];
                echo "<div class='row-c'>";
                echo "<div class='column-2 box-info'>";
                echo "<div class='nombre'>";
                echo "<span class='info'>NOMBRE: </span> ".$actividad['nombre_act']."<br>";
                echo "</div>";
                echo "<br>";
                echo "<span class='info'>TEMA: </span> ".$actividad['tema_act']."<br><br>";
                echo "<span class='info'>DESCRIPCIÓN: </span> ".$actividad['desc_act']."<br><br>";
                echo "<span class='info' >AUTOR:</span> <a href='./mis_actividades.php?author={$id_autor}'>{$nombre_autor}</a>";
                echo"</div>";
                echo "<div class='column2 image'>";
                echo "<img src='".$ruta."' alt='".$actividad['nombre_act']."'><br><br>";
                if (isset($_SESSION['nombre_usuario'])) {
                    echo "      <button class='btn btn-light m-1' type='submit' onClick='like(".$actividad['id'].", ".$_SESSION['id_usuario'].")' id='act-".$actividad['id']."-like-bttn'>$likes_actividad <i class='fa-solid fa-heart' id='act-".$actividad['id']."-like-icon'></i></button>";
                } else {
                    echo "      <button class='btn btn-light m-1' type='submit' onClick='window.location.href = \"./login.php\"' id='act-".$actividad['id']."-like-bttn'>$likes_actividad <i class='fa-solid fa-heart' id='act-".$actividad['id']."-like-icon'></i></button>";
                }
                echo "</div>";
                echo "</div>";
                
            } else {
                echo "<script>window.location.href = './actividades.php';</script>";
            }
        } else {
            echo "<script>window.location.href = './actividades.php';</script>";
        }
    ?>
</body>
</html>