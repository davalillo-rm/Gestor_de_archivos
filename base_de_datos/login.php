<?php
session_start();

// Verificar si ya hay una sesión activa
if (isset($_SESSION['usuario'])) {
    header('Location: inicio.php'); // Si el usuario ya está logueado, redirigirlo
    exit;
}

include('conexion.php'); // Asegúrate de que la conexión a la base de datos esté bien configurada

if (!empty($_POST['btningresar'])) {
    if (empty($_POST['usuario']) && empty($_POST['password'])) {
        echo "<div class='alert alert-danger'>LOS CAMPOS ESTAN VACIOS</div>";
    } else {
        $usuario = $_POST['usuario'];
        $clave = $_POST['password'];

        // Consulta para verificar usuario y contraseña en la base de datos
        $sql = $conexion->query("SELECT * FROM usuario WHERE usuario='$usuario' AND clave='$clave'");
        if ($datos = $sql->fetch_object()) {
            // Si el usuario es válido, guardar en la sesión
            $_SESSION['usuario'] = $usuario; // Guarda el nombre de usuario en la sesión
            header('Location: inicio.php'); // Redirige al inicio
            exit;
        } else {
            echo "<div class='alert alert-danger'>ACCESO DENEGADO</div>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> <!-- Corregido 'viweport' a 'viewport' -->

    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
    <link href="https://tresplazas.com/web/img/big_punto_de_venta.png" rel="shortcut icon">
    <title>Inicio de sesión</title>

</head>

<body>
    <img class="wave" src="img/wave.png">
    <div class="container">
        <div class="img">
            <img src="img/bg.png">
        </div>
        <div class="login-content">
            <form method="post" action="">
                <img src="img/avatar.png">
                <h2 class="title">BIENVENIDO</h2>

                <div class="input-div one">
                    <div class="i">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="div">
                        <h5>Usuario</h5>
                        <input id="usuario" type="text" class="input" name="usuario">
                    </div>
                </div>
                <div class="input-div pass">
                    <div class="i">
                        <i class="fas fa-lock"></i>
                    </div>
                    <div class="div">
                        <h5>Contraseña</h5>
                        <input type="password" id="input" class="input" name="password">
                    </div>
                </div>
                <div class="view">
                    <div class="fas fa-eye verPassword" onclick="vista()" id="verPassword"></div>
                </div>

                <div class="text-center">
                    <a class="font-italic isai5" href="">Olvidé mi contraseña</a>
                </div>
                <input name="btningresar" class="btn" type="submit" value="INICIAR SESION">
            </form>
        </div>
    </div>
    <script src="js/fontawesome.js"></script>
    <script src="js/main.js"></script>
    <script src="js/main2.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/bootstrap.bundle.js"></script>

</body>

</html>