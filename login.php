<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <title>Iniciar sesión</title>
</head>
<body>
    <div class="box">
    <div class="form">
        <form action="login.php" method="POST">
            <h2>Iniciar sesión</h2>
            <div class="inputBox">
                <input type="text" name="nombre_usuario" id="nombre_usuario" required>
                <span>Nombre de usuario</span>
                <i></i>
            </div>
            <div class="inputBox">
                <input type="password" name="contrasenia" id="contrasenia" required>
                <span>Contraseña</span>
                <i></i>
            </div>
            <div class="links">
                <a href="#">¿Has olvidado tu contraseña?</a>
                <a href="#">Registrarse</a>
            </div>
            <input type="submit" value="Iniciar sesión">
            <div class="links2">    
            <?php
                if ($_POST) {
                    session_start();
                    require('conexion.php');
                    $nombre_usuario = $_POST['nombre_usuario'];
                    $contrasenia = md5($_POST['contrasenia']); //21232f297a57a5a74389
                    $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $query = $conn->prepare("SELECT * FROM usuarios WHERE nombre= :nombre_usuario AND passwd = :contrasenia");
                    $query->bindParam(":nombre_usuario", $nombre_usuario);
                    $query->bindParam(":contrasenia", $contrasenia);
                    $query->execute();
                    $usuario = $query->fetch(PDO::FETCH_ASSOC);
                    
                    if ($usuario) {
                        $_SESSION['usuario'] = $usuario["nombre"];
                        header("location:paginasegura.php");
                    }else {
                        echo '<a href="#" id="error">Nombre de usuario o contraseña inválidos</a>';
                    }
                }
            ?>
            </div>
        </form>
    </div>
    </div>
</body>
</html>