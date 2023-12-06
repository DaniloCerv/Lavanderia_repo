<?php
// Incluye el archivo de conexión
include'../../Backend/conexion.php';

// Aquí puedes realizar tus consultas y operaciones con la base de datos utilizando la conexión $conn

// Prepara la consulta con marcadores de posición
$sql = "SELECT * FROM historial_servicios";
$stmt = $conn->prepare($sql);

if ($stmt) {
    // Ejecuta la consulta
    $stmt->execute();

    // Almacena los resultados en un arreglo
    $resultados2 = array();
    $stmt->bind_result($id_tiposerv, $nombre, $descripcion, $preciokg, $fecha_actualizacion,$usuario_actualizacion);
    while ($stmt->fetch()) {
        $resultado2 = array(
            'id_tiposerv' => $id_tiposerv,
            'nombre' => $nombre,
            'descripcion' => $descripcion,
            'preciokg' => $preciokg,
            'fecha_actualizacion' => $fecha_actualizacion,
            'usuario_actualizacion' => $usuario_actualizacion
        );
        $resultados2[] = $resultado2;
    }

    // Cierra el statement
    $stmt->close();
} else {
    echo "Error en la consulta.";
}

// Cierra la conexión a la base de datos cuando hayas terminado
$conn->close();


echo "</table>";
echo "<link rel='stylesheet' type='text/css' href='../src/tgs.css'>";

//añadimos los estilos para las tablas



//-------------------------

echo "<table id='user'>";
echo "<tr>";
//echo "<tr id='magaso'> <th > Triggers Perfil</th></tr>";
echo "<th>ID TIPO SERVICIO</th>";
echo "<th>NOMBRE</th>";
echo "<th>DESCRIPCION</th>";
echo "<th>PRECIO POR KG</th>";
echo "<th>FECHA DE ACTUALIZACION</th>";
echo "<th>USUARIO QUE ACTUALIZA</th>";
echo "</tr>";

foreach ($resultados2 as $resultado2) {
    echo "<tr>";
    echo "<td>" . $resultado2['id_tiposerv'] . "</td>";
    echo "<td>" . $resultado2['nombre'] . "</td>";
    echo "<td>" . $resultado2['descripcion'] . "</td>";
    echo "<td>" . $resultado2['preciokg'] . "</td>";
    echo "<td>" . $resultado2['fecha_actualizacion'] . "</td>";
    echo "<td>" . $resultado2['usuario_actualizacion'] . "</td>";
    echo "</tr>";
}

echo "</table>";

