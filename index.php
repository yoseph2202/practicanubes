<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Agenda de Datos</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
</head>
<body>
  <div class = "container">
    <div class="jumbotron">
      <h1 class="display-4">Agenda de Datos</h1>
      <p class="lead">Aplicacion de muestra de una Agenda</p>
      <hr class="my-4">
      <p>PHP aplicacion de muestra conectada a una base de datos MySQL para mostrar una Agenda</p>
    </div>
    <table class="table table-striped table-responsive">
      <thead>
        <tr>
        <th>Nombre</th>
          <th>Apellido</th>
          <th>Direccion</th>
          <th>Telefono Fijo</th>
          <th>Telefono Movil</th>
          <th>Correo Electronico</th>
          <th>Distrito</th>
        </tr>
      </thead>
      <tbody>
      <?php
$conexion = mysqli_connect(getenv('MYSQL_HOST'), getenv('MYSQL_USER'), getenv('MYSQL_PASSWORD'), "BASEDATOS");

if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}

$cadenaSQL = "SELECT a.nombre, a.apellido, a.direccion, a.telefijo, a.telefmovi, a.email, d.nombre_distrito
              FROM agenda a
              INNER JOIN distrito d ON a.id_distrito = d.id_distrito";

$resultado = mysqli_query($conexion, $cadenaSQL);

if (!$resultado) {
    die("Error en la consulta: " . mysqli_error($conexion));
}

while ($fila = mysqli_fetch_object($resultado)) {
    echo "<tr>
            <td>" . $fila->nombre . "</td>
            <td>" . $fila->apellido . "</td>
            <td>" . $fila->direccion . "</td>
            <td>" . $fila->telefijo . "</td>
            <td>" . $fila->telefmovi . "</td>
            <td>" . $fila->email . "</td>
            <td>" . $fila->nombre_distrito . "</td>
          </tr>";
}
?>

   </table>
 </div>
 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
</body>
</html>

