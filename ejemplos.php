<!-- Variables del servidor -->
<?php
    //   $user = $_GET['user'];
    //   $userpasswd = $_GET['userpasswd'];
    //   $servername = "localhost";
    //   $username = "root";
    //   $password = "password";
    //   $dbname = "prueba";
?>
<!-- Probar conexión -->
<?php
  // !Probar conexión
  // try {
  //   $conn = new PDO("mysql:host=$servername;dbname=$dbname",$username, '');
  //   $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  //   echo "Conectado satisfactoriamente<br>";
  // } catch(PDOException $e) {
  //   echo "Conexión fallida: " . $e->getMessage();
  // }
?>
<!-- Crear base de datos -->
<?php
  // ?Crear base de datos?
  // !Solo para la primera vez
  // try {
  //   $conn = new PDO("mysql:host=$servername;dbname=$dbname",$username, '');

  //   // establecer el error PDO a exception (si hay error salta al catch(){})
  //   $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  //   $sql = "CREATE DATABASE Prueba";
  //   // usamo exec() porque no hay resultados devueltos
  //   $conn->exec($sql);
  //   echo "Base de datos creada correctamente<br>";
  // } catch(PDOException $e) {
  //   echo $sql . "<br>" . $e->getMessage();
  // }
?>
<!-- Crear tabla -->
<?php
    //   // ?sql to create table
    //   // !Solo para la primera vez
    //   try {
    //     require('conexion.php');
    //     $conn = new PDO("mysql:host=$servername;dbname=$dbname",$username, '');
    //     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    //     // sql to create table
    //     $sql = "CREATE TABLE usuarios (
    //     id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    //     nombre VARCHAR(20) NOT NULL UNIQUE,
    //     passwd VARCHAR(20) NOT NULL
    //     )";
    
    //     // use exec() because no results are returned
    //     $conn->exec($sql);
    //     echo "Tabla Usuarios creada correctamente";
    //   } catch(PDOException $e) {
    //     echo $sql . "<br>" . $e->getMessage();
    //   }
?>
<!-- Insertar datos en la tabla -->
<?php
  //!Insertar datos en tabla
    //   try {
    //     require('conexion.php');
    //     $conn = new PDO("mysql:host=$servername;dbname=$dbname",$username, '');
    //     // set the PDO error mode to exception
    //     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //     $sql = "INSERT INTO usuarios (nombre, passwd)
    //     VALUES ('Brian', 'FROSTISTLOL21')";
    //     // use exec() because no results are returned
    //     $conn->exec($sql);
    //     $last_id = $conn->lastInsertId();
    //     echo "Nuevo registro creado satisfactoriamente. Último ID: ". $last_id;
    //   } catch(PDOException $e) {
    //     echo $sql . "<br>" . $e->getMessage();
    //   }

  //!Insertar varios datos a la vez en tabla
  // try {
  //   $conn = new PDO("mysql:host=$servername;dbname=$dbname",$username, '');
  //   // set the PDO error mode to exception
  //   $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  //   // empezamos la transaction
  //   $conn->beginTransaction();
  //   // Nuestros SQL statements
  //   $conn->exec("INSERT INTO Usuarios (nombre, contrasena, email)
  //   VALUES ('John', 'Doe', 'john@example.com')");
  //   $conn->exec("INSERT INTO Usuarios (nombre, contrasena, email)
  //   VALUES ('Mary', 'Moe', 'mary@example.com')");
  //   $conn->exec("INSERT INTO Usuarios (nombre, contrasena, email)
  //   VALUES ('Julie', 'Dooley', 'julie@example.com')");
  //   // commit the transaction
  //   $conn->commit();
  //   echo "Nuevos registros creados correctamente.";
  //   } catch(PDOException $e) {
  //   // roll back the transaction if something failed
  //   $conn->rollback();
  //   echo "Error: " . $e->getMessage();
  //   }
?>
<!-- Declaraciones preparadas -->
<?php
  //!Declaraciones preparadas
  try {
    require('conexion.php');
    $conn = new PDO("mysql:host=$servername;dbname=$dbname",$username, '');
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  //?Preparar y bindear
    $stmt = $conn->prepare("INSERT INTO usuarios (nombre, passwd)
    VALUES (:nombre, :contrasenia)");
    $stmt->bindParam(':nombre', $nombre);
    $stmt->bindParam(':contrasenia', $contrasena);
    // insert a row
    // $nombre = "admin";
    // $contrasena = md5('admin');

    // $stmt->execute();
    // insert another row
    $nombre = "brian";
    $contrasena = md5("FROSTISTLOL21");
    $stmt->execute();
    // insert another row
    // $firstname = "Julie";
    // $lastname = "Dooley";
    // $email = "julie@example.com";
    // $stmt->execute();
    echo "New records created successfully";
    } catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
    }
?>
<!-- Eliminar datos -->
<?php
  //!Modificar datos
  //?Delete (Eliminar datos)
  // try {
  //   require("conexion.php");
  //   $conn = new PDO("mysql:host=$servername;dbname=$dbname",$username, '');
  //   $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
  //   //TODO sql to delete a record
  //   $sql = "DELETE FROM usuarios WHERE id=2";
  
  //   // use exec() because no results are returned
  //   $conn->exec($sql);
  //   echo "Registro eliminado correctamente";
  // } catch(PDOException $e) {
  //   echo $sql . "<br>" . $e->getMessage();
  // }
?>
<!-- Update -->
<?php

  //?Update
  // try {
  //   $conn = new PDO("mysql:host=$servername;dbname=$dbname",$username, '');
  //   $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
  //     //TODO SQL PARA HACER UPDATE
  //     $sql = "UPDATE Usuarios SET id=1 WHERE contrasena='Giraldo'";
  //     //Preparar consulta
  //     $stmt = $conn->prepare($sql);
  //     //Se ejecuta la consulta
  //     $stmt->execute();
  
  //   echo $stmt->rowCount() . " registros actualizados correctamente";
  // } catch(PDOException $e) {
  //   echo $sql . "<br>" . $e->getMessage();
  // }
?>
<!-- Cerrar conexión con servidor -->
<?php
  // //!Cierra la conexión a la base de datos
  $conn = null;
?>
<!-- Consulta (tabla negra) -->
<?php
  //!Seleccionar datos (consultas)
    // class TableRows extends RecursiveIteratorIterator {
    //     function __construct($it) {
    //     parent::__construct($it, self::LEAVES_ONLY);
    //     }
    
    //     function current() {
    //     return "<td>" . parent::current(). "</td>";
    //     }
    
    //     function beginChildren(): void {
    //     echo "<tr>";
    //     }
    
    //     function endChildren(): void {
    //     echo "</tr>" . "\n";
    //     }
    // }
    // try {
    //     $conn = new PDO("mysql:host=$servername;dbname=$dbname",$username, '');
    //     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
    //     //TODO:Toda la tabla
    //     $stmt = $conn->prepare("SELECT id, nombre, contrasena FROM Usuarios");
        
    //     //TODO: Dato con where
    //     //$stmt = $conn->prepare("SELECT id, nombre, contrasena FROM Usuarios WHERE contrasena='Doe'");
        
    //     //TODO: Dato con order by
    //     //$stmt = $conn->prepare("SELECT id, nombre, contrasena FROM Usuarios ORDER BY contrasena");
        
        
    //     $stmt->execute();
    
    //     // set the resulting array to associative
    //     $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    //     foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
    //     echo $v;
    //     }
    // } catch(PDOException $e) {
    //     echo "Error: " . $e->getMessage();
    // }
?>