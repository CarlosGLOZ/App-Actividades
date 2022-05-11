<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="../css/register.css">
    <title>Register</title>
</head>
<body>
<div class="cabecera">
    <h1>BIENVENIDO</h1>
</div>
<div class="padre">
    <div class="box">
        <?php
        // VALIDACIÓN DE FORMULARIO
        if (isset($_GET['validation']) && $_GET['validation']=='false') {
            echo " <h2 id='error'>Correo en uso</h2>";
        }else{
            echo "<h2 id='NoError'>Por favor, ingresa tus datos</h2>";
        }
        ?>
   
    <!-- FORMULARIO DE REGISTRO -->
    <form action="../proc/validate_register.php" method="post">
        <br>
        <label for="username">Usuario</label><br>
        <input class="form" type="text" name="username"  required>
        
        <br>
        <label for="email">Email</label><br>
        <input class="form"  type="email" name="email"  required>
        
        <br>
        <label for="email">Contraseña</label><br>
        <input class="form" type="password" name="password"    required>
        
        <br><label for="password">Confirma la contraseña</label><br>
        <input  class="form" type="password" name="password_conf" required>
      
        <input id="submit" type="submit" value="Registrarse">
       
    </form>
    <!-- BOTÓN PARA INICIAR SESIÓN -->
    <p id="registro">o <a href="./login.php">inicia sesion</a> con una cuenta existente</p>
    </div>
    <!-- BOTOÓN PARA IR A INDEX.HTML -->
    <svg onclick="window.location.href='../index.html'" xmlns="http://www.w3.org/2000/svg" width="24" height="24" style="fill: rgba(255, 255, 255, 1);transform: ;msFilter:;"><path d="M21 11H6.414l5.293-5.293-1.414-1.414L2.586 12l7.707 7.707 1.414-1.414L6.414 13H21z"></path></svg>
</div>

</body>
</html>