<?php
// $conn = null;
$servername = "localhost";
$username = "root";
$password = "password";
$dbname = "prueba";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname",$username, '');
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
  echo "Error de conexion: " . $e->getMessage();
  exit;
}
return $conn;
?>