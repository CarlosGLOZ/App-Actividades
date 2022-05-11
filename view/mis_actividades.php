<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis Actividades</title>
    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/e0b63cee0f.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="../css/mis_actividades.css">
    <link rel="stylesheet" href="../css/main.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="../js/likeActivity.js"></script>
</head>
<body>



    
    <!-- PRIMERO COMPROBAR QUE LA URL ESTÁ CORRECTA -->
    <?php
    session_start();

    // procesar la ruta absoluta
    $filePathArray = explode("\\",__FILE__);
    array_splice($filePathArray, -2);
    for ($i=0; $i < count($filePathArray); $i++) { 
        if ($filePathArray[$i] == "www") {
            array_splice($filePathArray, 0, $i);
        }
    }
    $filePath = $_SERVER['SERVER_NAME']."/".join("/", $filePathArray)."/";

    // ASEGURARSE DE QUE LA URL ES CORRECTA 
    if (!isset($_GET['author'])) {
        echo "<script>window.location.href = './actividades.php';</script>";
    } else {
        require "../BBDD/conexion.php";
        
        // HACER UNA QUERY PARA RECOGER LOS DATOS DEL AUTOR DE LA ACTIVIDAD
        $author_query = "SELECT * from tbl_usuario where id = ".$_GET['author'].";";
        $author_request = mysqli_query($conexion, $author_query);
        $author = mysqli_fetch_array($author_request);
    ?>

<!-- NAV -->
<?php
// COMPROBAR SI EL USUARIO ESTÁ LOGEADO
if (isset($_SESSION['id_usuario'])) {
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
                <button class="btn btn-light form-control me-1" type="button" onclick="window.location.href = './subir_actividad.php'"><i class="fa-solid fa-arrow-up-from-bracket"></i></button>
                <button class="btn btn-light form-control ms-1" type="button" onclick="window.location.href = './mis_actividades.php?author=<?php echo $_SESSION['id_usuario']; ?>'"> <?php echo $_SESSION['nombre_usuario']; ?> </button>
                <button class="btn btn-light form-control ms-1" type="button" onclick="window.location.href = '../proc/logout.php'">LogOut</button>
            </form>
        </div>
    </div>
</nav>
<?php
} else {
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
<?php
}
?>


<!-- cabecera -->
<div class="cabecera">

<svg xmlns="http://www.w3.org/2000/svg" width="500.5" height="68.515" viewBox="0 0 687.5 108.515">
<text id="Mis_actividades" data-name="Mis_actividades" transform="translate(426.5 97.5)" font-size="40" font-family="SegoeUI, Segoe UI"><tspan x="0" y="0">Mis Actividades</tspan></text>
<g id="Icon_feather-user" data-name="Icon feather-user" transform="translate(-4.5 -3)">
    <path id="Trazado_8" data-name="Trazado 8" d="M98.9,57.338V45.726A23.226,23.226,0,0,0,75.677,22.5H29.226A23.226,23.226,0,0,0,6,45.726V57.338" transform="translate(0 52.677)" fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="3"/>
    <path id="Trazado_9" data-name="Trazado 9" d="M58.451,27.726A23.226,23.226,0,1,1,35.226,4.5,23.226,23.226,0,0,1,58.451,27.726Z" transform="translate(17.226)" fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="3"/>
</g>
<text id="Username" transform="translate(155.5 97.5)" font-size="40" font-family="SegoeUI, Segoe UI"><tspan x="0" y="0" ><?php echo "<a href='mis_actividades.php?author={$_GET['author']}'>{$author['nombre_usuario']}<a/>"; ?></tspan></text>
<path id="Icon_awesome-long-arrow-alt-right" data-name="Icon awesome-long-arrow-alt-right" d="M22.074,15.188H.844A.844.844,0,0,0,0,16.031v3.938a.844.844,0,0,0,.844.844h21.23v3.239a1.688,1.688,0,0,0,2.881,1.193l6.051-6.051a1.687,1.687,0,0,0,0-2.386l-6.051-6.051a1.688,1.688,0,0,0-2.881,1.193Z" transform="translate(367.5 70.742)"/>
</svg>
</div>



    <!-- HACER UNA QUERY PARA RECOGER LAS ACTIVIDADES CUYO AUTOR SEA EL USUARIO DEL GET -->
    <!-- SI EL USUARIO NO ES EL DE LA SESIÓN, SE RECOGERAN SOLO LAS ACTIVIDADES PÚBLICAS -->
    <?php 
        if (isset($_SESSION['id_usuario'])) {
            if ($_GET['author']==$_SESSION['id_usuario']) {
                $act_query = "SELECT * FROM tbl_actividad WHERE autor_act = ".$_GET['author'];
            } else {
                $act_query = "SELECT * FROM tbl_actividad WHERE autor_act = ".$_GET['author']." and visibilidad_act = 'publica'";
            }
            $actividades = mysqli_query($conexion, $act_query);

            foreach ($actividades as $key => $actividad) {
                $ruta = $actividad['foto_act'];

                // QUERY DEL AUTOR DE LA ACTIVIDAD
                $auth_query = "SELECT * FROM tbl_usuario WHERE id=".$actividad['autor_act'];
                $auth_request = mysqli_query($conexion, $auth_query);
                $author = mysqli_fetch_array($auth_request);

                // QUERY DE LOS LIKES DE LA ACTIVIDAD
                $likes_query = "SELECT count(id) as 'likes' FROM tbl_actividad_gustada WHERE id_actividad=".$actividad['id'].";";
                $likes_request = mysqli_query($conexion, $likes_query);
                $likes_actividad = mysqli_fetch_array($likes_request)['likes']; 

                $act_link = "http://".$filePath."view/actividad.php?act=".$actividad['id'];

                // MOSTRAR DATOS DE LA ACTIVIDAD
                echo "<div class='column-3 padding-mobile displayer'>";
                echo "  <h5>".$actividad['nombre_act']."</h5>";
                echo "  <img src='{$ruta}' alt='".$actividad['nombre_act']."' onClick='window.location.href = \"{$act_link}\";' class='xplore-act-img'>";
                echo "  <div  style='float: left;' class='padding-m like'>";
                echo "      <p>".$author['nombre_usuario']."</p>";
                echo "      <button class='btn btn-light m-1' type='submit' onClick='navigator.clipboard.writeText(\"{$act_link}\");'><i class='fa-solid fa-link'></i></button>";
                echo "      <button class='btn btn-light m-1' type='submit' onClick='like(".$actividad['id'].", ".$_SESSION['id_usuario'].")' id='act-".$actividad['id']."-like-bttn'>$likes_actividad <i class='fa-solid fa-heart' id='act-".$actividad['id']."-like-icon'></i></button>";
                echo "  </div>";    
                echo "</div>";
            }
        } else {
            $act_query = "SELECT * FROM tbl_actividad WHERE autor_act = ".$_GET['author']." and visibilidad_act = 'publica'";
            $actividades = mysqli_query($conexion, $act_query);

            foreach ($actividades as $key => $actividad) {
                $ruta = $actividad['foto_act'];

                // QUERY DEL AUTOR DE LA ACTIVIDAD
                $auth_query = "SELECT * FROM tbl_usuario WHERE id=".$actividad['autor_act'];
                $auth_request = mysqli_query($conexion, $auth_query);
                $author = mysqli_fetch_array($auth_request);
                // QUERY DE LOS LIKES DE LA ACTIVIDAD
                
                $likes_query = "SELECT count(id) as 'likes' FROM tbl_actividad_gustada WHERE id_actividad=".$actividad['id'].";";
                $likes_request = mysqli_query($conexion, $likes_query);
                $likes_actividad = mysqli_fetch_array($likes_request)['likes']; 

                $act_link = "http://".$filePath."view/actividad.php?act=".$actividad['id'];

                // MOSTRAR DATOS DE LA ACTIVIDAD
                echo "<div class='column-3 padding-mobile displayer'>";
                echo "  <h5>".$actividad['nombre_act']."</h5>";
                echo "  <img src='{$ruta}' alt='".$actividad['nombre_act']."' onClick='window.location.href = \"{$act_link}\";' class='xplore-act-img'>";
                echo "  <div  style='float: left;' class='padding-m like'>";
                echo "      <p>".$author['nombre_usuario']."</p>";
                echo "      <button class='btn btn-light m-1' type='submit' onClick='navigator.clipboard.writeText(\"{$act_link}\");'><i class='fa-solid fa-link'></i></button>";
                echo "      <button class='btn btn-light m-1' type='submit' onClick='window.location.href = \"./login.php\"'>$likes_actividad<i class='fa-solid fa-heart' id='act-".$actividad['id']."-like-icon'></i></button>";                  
                echo "  </div>";    
                echo "</div>";
            }
        }
    }
    ?>
</body>
</html>