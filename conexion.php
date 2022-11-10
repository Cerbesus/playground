<?php
//?Datos de conexión
$servername = "localhost"; //Nombre del server
$username = "root"; //Usuario
$password = ""; //Contraseña
$dbname = "prueba"; //Nombre de la base de datos

//?Cuando ocurre un error en un el código ignora el resto de try y ejecuta catch.
try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname",$username, $password); // 
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //Si hay un error en la consulta devuelve un error
} catch(PDOException $e) {
  echo "Error de conexion: " . $e->getMessage();
  exit;
}
return $conn;
?>