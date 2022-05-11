<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actividades</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/e0b63cee0f.js" crossorigin="anonymous"></script>
    <!-- Hoja de estilos -->
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/actividades.css"> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="../js/likeActivity.js"></script>

</head>

<body>

    <!-- SI EL USUARIO NO ESTÁ LOGEADO -->
    <?php
        // recogida de las actividades a mostrar
        require "../BBDD/conexion.php";
        if (isset($_GET['tema_actividad'])) {
            $filtro = $_GET['tema_actividad'];
            $act_query_byFav = "SELECT * FROM tbl_actividad WHERE tema_act = '{$filtro}' ORDER BY favs_act DESC LIMIT 5;";
        } else {
            $act_query_byFav = "SELECT * FROM tbl_actividad ORDER BY favs_act DESC LIMIT 5;";
        }
        $act_request_byFav = mysqli_query($conexion, $act_query_byFav);

        // comprovación de inicio de sesión del usuario
        session_start();
        if (!isset($_SESSION['email_usuario'])) {
            
    ?>
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
                            <a class="nav-link active disabled" aria-current="page" href="./actividades.html">Actividades</a>
                        </li>
                    </ul>
                    <form class="d-flex">
                        <!-- <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"> -->
                        <button class="btn btn-light form-control me-1" type="button" onclick="window.location.href = './login.php'"><i class="fa-solid fa-arrow-up-from-bracket"></i></button>
                        <button class="btn btn-light form-control ms-1" type="button" onclick="window.location.href = './login.php'">Acceder</button>
                    </form>
                </div>
            </div>
        </nav>
        <!-- Top -->
        <div class="row-c padding-m">
            <h4 class="column-1 padding-m">Top 5</h4>

            <div class="column-1 padding-s">
                <?php 
                    foreach ($act_request_byFav as $actividad) {
                        $nombreArchivo = explode("/",$actividad['foto_act'])[8];
                        $ruta = "../img/actividades/".$nombreArchivo;
                        $act_link = "./actividad.php?act=".$actividad['id'];

                        $auth_query = "SELECT * FROM tbl_usuario WHERE id=".$actividad['autor_act'];
                        $auth_request = mysqli_query($conexion, $auth_query);
                        $author = mysqli_fetch_array($auth_request);

                        echo "<div class='column-5 padding-s'>";
                        echo "  <h5>".$actividad['nombre_act']."</h5>";
                        echo "  <img src='{$ruta}' alt='".$actividad['nombre_act']."' onClick='window.location.href = \"{$act_link}\";' class='top-5-act'>";
                        echo "  <p>".$author['nombre_usuario']."<p>";
                        echo "</div>";
                    }
                
                ?>
            </div>

        </div>

        <!-- listado de actividades -->
        <div class="row-c">
            <div class="column-1 padding-m">
                <h4 class="padding-m">Explora</h4>
            </div>

            <form method="get">
                <select name="tema_actividad">
                    <option value="matematicas">Matemáticas</option>
                    <option value="informatica">Informática</option>
                </select>
                <input type="submit" value="Filtrar">
            </form>

            <?php 
                $act_query_byDate = "SELECT * FROM tbl_actividad ORDER BY fecha_public_act DESC LIMIT 6;";
                $act_request_byDate = mysqli_query($conexion, $act_query_byDate);

                foreach ($act_request_byDate as $actividad) {
                    $nombreArchivo = explode("/",$actividad['foto_act'])[8];
                    $ruta = "../img/actividades/".$nombreArchivo;
                    $act_link = "./actividad.php?act=".$actividad['id'];

                    $auth_query = "SELECT * FROM tbl_usuario WHERE id=".$actividad['autor_act'];
                    $auth_request = mysqli_query($conexion, $auth_query);
                    $author = mysqli_fetch_array($auth_request);

                    $likes_query = "SELECT count(id) as 'likes' FROM tbl_actividad_gustada WHERE id_actividad=".$actividad['id'].";";
                    $likes_request = mysqli_query($conexion, $likes_query);
                    $likes_actividad = mysqli_fetch_array($likes_request)['likes']; 

        
                    echo "<div class='column-3 padding-mobile displayer'>";
                    echo "  <h5>".$actividad['nombre_act']."</h5>";
                    echo "  <img src='{$ruta}' alt='".$actividad['nombre_act']."' onClick='window.location.href = \"{$act_link}\";'>";
                    echo "  <div  style='float: left;' class='padding-m like'>";
                    echo "      <p>".$author['nombre_usuario']."</p>";
                    echo "      <button class='btn btn-light m-1' type='submit' onClick='navigator.clipboard.writeText(\"".$actividad['link_act']."\");'><i class='fa-solid fa-link'></i></button>";
                    echo "      <button class='btn btn-light m-1' type='submit' onClick='window.location.href = \"./login.php\"'>$likes_actividad<i class='fa-solid fa-heart' id='act-".$actividad['id']."-like-icon'></i></button>";                  
                    echo "  </div>";    
                    echo "</div>";
                }
            
            ?>
        </div>
    
    <!-- SI EL USUARIO ESTÁ LOGEADO -->
    <?php } else {?>
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
                            <a class="nav-link active disabled" aria-current="page" href="./actividades.html">Actividades</a>
                        </li>
                    </ul>
                    <form class="d-flex">
                        <!-- <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"> -->
                        <button class="btn btn-light form-control me-1" type="button" onclick="window.location.href = './subir_actividad.php'"><i class="fa-solid fa-arrow-up-from-bracket"></i></button>
                        <button class="btn btn-light form-control ms-1" type="button" onclick="window.location.href = './mis_actividades.php?author=<?php echo $_SESSION['id_usuario']; ?>'"> <?php echo $_SESSION['nombre_usuario']; ?> </button>
                        <button class="btn btn-light form-control ms-1" type="button" onclick="window.location.href = '../proc/logout.php'">LogOut</button>
                    </form>
                </div>
            </div>
        </nav>
        <!-- Top -->
        <div class="row-c padding-m">
            <h4 class="column-1 padding-m">Top 5</h4>

            <div class="column-1 padding-s">
                <?php 
                    // recorrer query de actividades y mostrar 4
                    foreach ($act_request_byFav as $actividad) {
                        $nombreArchivo = explode("/",$actividad['foto_act'])[8];
                        $ruta = "../img/actividades/".$nombreArchivo;
                        $act_link = "./actividad.php?act=".$actividad['id'];

                        $auth_query = "SELECT * FROM tbl_usuario WHERE id=".$actividad['autor_act'];
                        $auth_request = mysqli_query($conexion, $auth_query);
                        $author = mysqli_fetch_array($auth_request);

                        echo "<div class='column-5 padding-s'>";
                        echo "  <h5>".$actividad['nombre_act']."</h5>";
                        echo "  <img src='{$ruta}' alt='".$actividad['nombre_act']."' onClick='window.location.href = \"{$act_link}\";' class='top-5-act'>";
                        echo "  <p>".$author['nombre_usuario']."<p>";
                        echo "</div>";
                    }
                
                ?>

            </div>

        </div>

        <!-- listado de actividades -->
        <div class="row-c">
            <div class="column-1 padding-m">
                <h4 class="padding-m">Explora</h4>
            </div>

            <form method="get">
                <select name="tema_actividad">
                    <option value="matematicas">Matemáticas</option>
                    <option value="informatica">Informática</option>
                </select>
                <input type="submit" value="Filtrar">
            </form>

            <?php 
                if (isset($_GET['tema_actividad'])) {
                    $filtro = $_GET['tema_actividad'];
                    $act_query_byDate = "SELECT * FROM tbl_actividad WHERE tema_act = '{$filtro}' ORDER BY fecha_public_act DESC LIMIT 6;";
                } else {
                    $act_query_byDate = "SELECT * FROM tbl_actividad ORDER BY fecha_public_act DESC;";
                }
                $act_request_byDate = mysqli_query($conexion, $act_query_byDate);

                foreach ($act_request_byDate as $actividad) {
                    $nombreArchivo = explode("/",$actividad['foto_act'])[8];
                    $ruta = "../img/actividades/".$nombreArchivo;
                    $act_link = "./actividad.php?act=".$actividad['id'];

                    $auth_query = "SELECT * FROM tbl_usuario WHERE id=".$actividad['autor_act'].";";
                    $auth_request = mysqli_query($conexion, $auth_query);
                    $author = mysqli_fetch_array($auth_request);

                    $likes_query = "SELECT count(id) as 'likes' FROM tbl_actividad_gustada WHERE id_actividad=".$actividad['id'].";";
                    $likes_request = mysqli_query($conexion, $likes_query);
                    $likes_actividad = mysqli_fetch_array($likes_request)['likes'];

                    echo "<div class='column-3 padding-mobile displayer'>";
                    echo "  <h5>".$actividad['nombre_act']."</h5>";
                    echo "  <img src='{$ruta}' alt='".$actividad['nombre_act']."' onClick='window.location.href = \"{$act_link}\";'>";
                    echo "  <div  style='float: left;' class='padding-m like'>";
                    echo "      <p>".$author['nombre_usuario']."</p>";
                    echo "      <button class='btn btn-light m-1' type='submit' onClick='navigator.clipboard.writeText(\"".$actividad['link_act']."\");'><i class='fa-solid fa-link'></i></button>";
                    echo "      <button class='btn btn-light m-1' type='submit' onClick='like(".$actividad['id'].", ".$_SESSION['id_usuario'].")' id='act-".$actividad['id']."-like-bttn'>$likes_actividad <i class='fa-solid fa-heart' id='act-".$actividad['id']."-like-icon'></i></button>";
                    echo "  </div>";    
                    echo "</div>";
                }
            
            ?>
        </div>
    <?php }?>
</body>

</html>