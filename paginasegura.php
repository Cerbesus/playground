<?php
  session_start();
  if(isset($_SESSION['usuario'])){

?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- CSS propio -->
    <!-- <link rel="stylesheet" href="css/style.css"> -->
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <title>Base de datos</title>
  </head>
  <body>   
    <!-- Barra de navegación -->
    <div class="container">
      <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
        <a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
          <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"></use></svg>
        </a>
        
        <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
          <li><a href="#" class="nav-link px-2 link-secondary">Inicio</a></li>
          <li><a href="#" class="nav-link px-2 link-dark">Editar</a></li>
          <li><a href="#" class="nav-link px-2 link-dark">Añadir</a></li>
          <li><a href="#" class="nav-link px-2 link-dark">Nose</a></li>
          <li><a href="" class="nav-link px-2 link-dark disabled"><?php echo $_SESSION['usuario'];?></a></li>
        </ul>
        
        <div class="col-md-3 text-end">
          <a href="salir.php"><button type="button" class="btn btn-danger">Cerrar sesión</button></a>
        </div>
      </header>
    </div>

    <table class='table table-striped'>
      <tr>
        <th>Id</th>
        <th>Nombre</th>
        <th>Contraseña</th>
      </tr>
    <!-- Consulta (tabla negra) -->
    <?php
      //!Seleccionar datos (consultas)
      

      class TableRows extends RecursiveIteratorIterator {
        function __construct($it) {
          parent::__construct($it, self::LEAVES_ONLY);
        }
      
        function current() {
          return "<td>" . parent::current(). "</td>";
        }
      
        function beginChildren(): void {
          echo "<tr>";
        }
      
        function endChildren(): void {
          echo "</tr>" . "\n";
        }
      }

      try {
        require("conexion.php");
        $conn = new PDO("mysql:host=$servername;dbname=$dbname",$username, '');
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        //TODO:Toda la tabla
        $stmt = $conn->prepare("SELECT id, nombre, passwd FROM usuarios");
        
        //TODO: Dato con where
        //$stmt = $conn->prepare("SELECT id, nombre, contrasena FROM Usuarios WHERE contrasena='Doe'");
        
        //TODO: Dato con order by
        //$stmt = $conn->prepare("SELECT id, nombre, contrasena FROM Usuarios ORDER BY contrasena");
        
        
        $stmt->execute();
      
        // set the resulting array to associative
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
          echo $v;
        }
      } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
      }
    ?>
    </table>

    <footer class="py-3 my-4">
      <ul class="nav justify-content-center border-bottom pb-3 mb-3">
        <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Home</a></li>
        <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Features</a></li>
        <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Pricing</a></li>
        <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">FAQs</a></li>
        <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">About</a></li>
      </ul>
      <p class="text-center text-muted">© 2022 Brian Giraldo</p>
    </footer>
  </body>
</html>
<?php
}else {
  header("location:login.php");
}

?>