<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/login.css">
    <title>Login</title>
</head>
<body>


<!-- DIV QUE CONTIENE LA CABECERA (EMOTICONO Y FRASE DE BIENVENIDA) -->
<div class="cabecera">
       
<!-- EMOTICO CARA SVG -->
<svg xmlns="http://www.w3.org/2000/svg" width="84.095" height="84.095" viewBox="0 0 84.095 84.095">
  <path id="Icon_awesome-smile-beam" data-name="Icon awesome-smile-beam" d="M41.547.563A41.547,41.547,0,1,0,83.095,42.11,41.54,41.54,0,0,0,41.547.563ZM18.763,36.648c.553-7.053,5.394-11.962,9.382-11.962s8.829,4.909,9.382,11.962a1.335,1.335,0,0,1-2.5.754l-1.592-2.848c-1.29-2.3-3.217-3.619-5.277-3.619s-3.987,1.323-5.277,3.619L21.293,37.4a1.355,1.355,0,0,1-2.53-.754ZM60.78,57.221a25.026,25.026,0,0,1-38.465,0c-2.262-2.731,1.843-6.148,4.121-3.434a19.685,19.685,0,0,0,30.222,0c2.278-2.714,6.383.72,4.121,3.434ZM61.819,37.4l-1.592-2.848c-1.29-2.3-3.217-3.619-5.277-3.619s-3.987,1.323-5.277,3.619L48.081,37.4a1.338,1.338,0,0,1-2.5-.754c.553-7.053,5.394-11.962,9.382-11.962S63.8,29.6,64.348,36.648A1.355,1.355,0,0,1,61.819,37.4Z" transform="translate(0.5 -0.063)" fill="#fff" stroke="#000" stroke-width="1"/>
</svg>

    <h1>NOS ALEGRA VOLVER A VERTE</h1>

</div>


<!-- DIV PADRE QUE CONTENDRA LA CAJA CON LOS FORMULARIOS (NOS PERMITE CENTRAR EL CONTENIDO) -->
    <div class="padre">
   
    <div class="box">
    <?php
    // VALIDACIÓN
        if (isset($_GET['validation']) && ($_GET['validation']=="false")) {
            echo "<h2 id='error'>Usuario o contraseña incorrecto</h2>";
        }else{
           echo "<h2 id='NoError'>Por favor, ingresa tus datos</h2>";
        }
        ?>
    
    <!-- FORMULARIO DE LOGIN -->
    <form action="../proc/validate_login.php" method="post">
        <label for="email">Email</label><br>
        <input  class="form" type="email" name="email" requied>
        <br>
        <label for="password">Contraseña</label><br>
        <input class="form" type="password" name="password" required>
        <br>
       
        <input id="submit" type="submit" value="INICIAR SESIÓN">
        
    </form>
    <!-- BOTÓN ADICIONAL PARA REGISTRARSE -->
    <p id="registro">o <a href="./register.php">registrate</a> con una cuenta nueva</p>
    </div>
    <!-- BOTÓN PARA IR A INDEX.HTML -->
    <svg onclick="window.location.href='../index.html'" xmlns="http://www.w3.org/2000/svg" width="24" height="24" style="fill: rgba(255, 255, 255, 1);transform: ;msFilter:;"><path d="M21 11H6.414l5.293-5.293-1.414-1.414L2.586 12l7.707 7.707 1.414-1.414L6.414 13H21z"></path></svg>
  
  
    </div>
  
</body>
</html>