<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subir Actividad</title>
    <link rel="stylesheet" href="../css/subir.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>

     <?php 
    // COMPROBAR QUE EL USUARIO ESTÁ LOGEADO, SI NO, DEVOLVERLO A LOGIN
    session_start();
    if (!isset($_SESSION['email_usuario'])) {
        echo "<script>window.location.href = './login.php';</script>";
    } else { ?>


<!-- Menú de navegación -->

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
                            <a class="nav-link" aria-current="page" href="./actividades.php">Actividades</a>
                        </li>
                    </ul>
                    <form class="d-flex">
                        <!-- <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"> -->
                        
                        <button class="btn btn-light form-control ms-1" type="button" onclick="window.location.href = './mis_actividades.php?author=<?php echo $_SESSION['id_usuario']; ?>'"> <?php echo $_SESSION['nombre_usuario']; ?> </button>
                        <button class="btn btn-light form-control ms-1" type="button" onclick="window.location.href = '../proc/logout.php'">LogOut</button>
                    </form>
                </div>
            </div>
        </nav>


        <!-- Cabecera con iconos de la ubicación en la web -->
 <div class="cabecera">


 <!-- ICONO PERSONA -> USUARIO -> POSICON DE LA WEB -->

<svg xmlns="http://www.w3.org/2000/svg" width="387.5" height="68.515" viewBox="0 0 687.5 108.515">
<text id="Subir_actividad" data-name="Subir actividad" transform="translate(426.5 97.5)" font-size="40" font-family="SegoeUI, Segoe UI"><tspan x="0" y="0">Subir actividad</tspan></text>
<g id="Icon_feather-user" data-name="Icon feather-user" transform="translate(-4.5 -3)">
    <path id="Trazado_8" data-name="Trazado 8" d="M98.9,57.338V45.726A23.226,23.226,0,0,0,75.677,22.5H29.226A23.226,23.226,0,0,0,6,45.726V57.338" transform="translate(0 52.677)" fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="3"/>
    <path id="Trazado_9" data-name="Trazado 9" d="M58.451,27.726A23.226,23.226,0,1,1,35.226,4.5,23.226,23.226,0,0,1,58.451,27.726Z" transform="translate(17.226)" fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="3"/>
</g>
<text id="Username" transform="translate(155.5 97.5)" font-size="40" font-family="SegoeUI, Segoe UI"><tspan x="0" y="0" ><?php echo "<a href='mis_actividades.php?author={$_SESSION['id_usuario']}'>{$_SESSION['nombre_usuario']}<a/>"; ?></tspan></text>
<path id="Icon_awesome-long-arrow-alt-right" data-name="Icon awesome-long-arrow-alt-right" d="M22.074,15.188H.844A.844.844,0,0,0,0,16.031v3.938a.844.844,0,0,0,.844.844h21.23v3.239a1.688,1.688,0,0,0,2.881,1.193l6.051-6.051a1.687,1.687,0,0,0,0-2.386l-6.051-6.051a1.688,1.688,0,0,0-2.881,1.193Z" transform="translate(367.5 70.742)"/>
</svg>

</div>
<!-- Div que contiene los formularios sin la caja de subir -->
    <div class="formularios">

    <form action="../proc/upload.php" method="post" enctype="multipart/form-data">
     
        <input type="text" name="nombre_actividad" placeholder="Nombre" required>
    
        <input type="text" name="desc_actividad" placeholder="Descripción" required>
    
        <select name="tema_actividad">
            <option value="matematicas">Matemáticas</option>
            <option value="informatica">Informática</option>
        </select>
  
        <input id="checkbox" type="checkbox" name="visibilidad_actividad">
        <label for="visibilidad_actividad">Oculta</label>
        <input type="hidden" name="autor_actividad" value="<?php echo $_SESSION['email_usuario']; ?>">
        <!-- <input type="submit" value="SUBIR" required> -->
        <button type="submit">
        <svg xmlns="http://www.w3.org/2000/svg" width="44" height="44" viewBox="0 0 44 44">
            <path id="Icon_awesome-arrow-circle-up" data-name="Icon awesome-arrow-circle-up" d="M.563,22.563a22,22,0,1,1,22,22A22,22,0,0,1,.563,22.563ZM13.3,25.126l6.423-6.7v16.2a2.124,2.124,0,0,0,2.129,2.129h1.419A2.124,2.124,0,0,0,25.4,34.627v-16.2l6.423,6.7a2.131,2.131,0,0,0,3.043.035l.967-.976a2.12,2.12,0,0,0,0-3.007L24.071,9.407a2.12,2.12,0,0,0-3.007,0L9.283,21.179a2.12,2.12,0,0,0,0,3.007l.967.976A2.142,2.142,0,0,0,13.3,25.126Z" transform="translate(-0.563 -0.563)" fill="#7caff2"/>
        </svg>

        </button>


    </div>



<!-- CAJA DRUG AND DROP  -->
<div class="box">
    <div class="box has-advanced-upload">

        <div class="box__input">
            <input class="box__file" type="file" name="foto_actividad" id="file" />
            <!-- <label for="file"><strong>Choose a file</strong><span class="box__dragndrop"> or drag it here</span>.</label> -->
            <!-- <button class="box__button" type="submit">Upload</button> -->
        </div>
        <div class="box__uploading">Uploading…</div>
        <div class="box__success">Done!</div>
        <div class="box__error">Error! <span></span>.</div>



    </div>


</div>
<?php
// INFORMAR AL USUARIO DE ERRORES DE VALIDACIÓN
if (isset($_GET['val']) && $_GET['val']=="\"img_error\"") {
    echo "<script>alert('error de imagen. El tamaño, resolución o formato pueden ser incorrectos')</script>";
}elseif (isset($_GET['val']) && $_GET['val']=="\"insert_error\"") {
    echo "<script>alert('error con la insercción en la base de datos')</script>";
}elseif (isset($_GET['val']) && $_GET['val']=="\"upload_error\"") {
    echo "<script>alert('error al subir la imagen')</script>";
}elseif (isset($_GET['val']) && $_GET['val']=="\"field_error\"") {
    echo "<script>alert('comprueba que todos los campos estan rellenados')</script>";
}
?>

        
    </form>


    </div>
      

    <?php }?>
</body>
</html>