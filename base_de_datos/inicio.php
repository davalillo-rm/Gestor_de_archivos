<?php
session_start(); // Inicia la sesión al principio del archivo
if (!isset($_SESSION['usuario'])) { // Verifica que la sesión esté activa
    header('Location: login.php'); // Si no está activa, redirige al login
    exit;
}

// Cerrar sesión
if (isset($_POST['btnCerrarSesion'])) {
    session_destroy(); // Destruye la sesión
    header('Location: login.php'); // Redirige al login
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestor de Archivos</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="container">
        <div class="left-panel">
            <h2>Bienvenido, <?php echo $_SESSION['usuario']; ?></h2>
            <button>Inicio</button>
            <button>Enviar Mensaje</button>
            <button>Mensajes Enviados</button>
            <!-- Formulario para cerrar sesión -->
            <form method="post" action="">
                <button type="submit" name="btnCerrarSesion">Cerrar Sesión</button>
            </form>
        </div>
        <div class="main-panel">
            <h3>Usuarios Disponibles:</h3>
            <table>
                <thead>
                    <tr>
                        <th>Correo_destino</th>
                        <th>Asunto</th>
                        <th>Contenido</th>
                        <th>Archivos</th>
                        <th>Fecha_envio</th>
                        <th>Estado</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="6" style="text-align: center;">No hay mensajes disponibles</td>
                    </tr>
                </tbody>
            </table>

            <h3>Enviar Mensaje</h3>
            <form action="#" method="post">
                <div class="form-group">
                    <label for="email">Email de Destinatario:</label>
                    <input type="text" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="subject">Asunto:</label>
                    <input type="text" id="subject" name="subject" required>
                </div>
                <div class="form-group">
                    <label for="content">Contenido:</label>
                    <textarea id="content" name="content" rows="4" required></textarea>
                </div>
                <div class="file-import">
                    <label for="file">Importar:</label>
                    <input type="file" id="file" name="file">
                </div>
                <button type="submit">Enviar</button>
                <button type="button" onclick="window.location.reload()">Cancelar</button>
            </form>
        </div>
    </div>
</body>
</html>