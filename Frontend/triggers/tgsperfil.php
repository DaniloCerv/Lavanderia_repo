<?php
// Incluye el archivo de conexión
include'../../Backend/conexion.php';
// Aquí puedes realizar tus consultas y operaciones con la base de datos utilizando la conexión $conn

// Prepara la consulta con marcadores de posición
$sql = "SELECT * FROM updates_perfil";
$stmt = $conn->prepare($sql);

if ($stmt) {
    // Ejecuta la consulta
    $stmt->execute();

    // Almacena los resultados en un arreglo
    $resultados1 = array();
    $stmt->bind_result($id, $user_id, $nombre, $apellido, $fecha_nacimiento, $genero_id, $fecha_actualizacion,$usuario_actualizacion);
    while ($stmt->fetch()) {
        $resultado1 = array(
            'id' => $id,
            'user_id' => $user_id,
            'nombre' => $nombre,
            'apellido' => $apellido,
            'fecha_nacimiento' => $fecha_nacimiento,
            'genero_id' => $genero_id,
            'fecha_actualizacion' => $fecha_actualizacion,
            'usuario_actualizacion' => $usuario_actualizacion
        );
        $resultados1[] = $resultado1;
    }

    // Cierra el statement
    $stmt->close();
} else {
    echo "Error en la consulta.";
}

// Cierra la conexión a la base de datos cuando hayas terminado


echo "<table>";
echo "<link rel='stylesheet' type='text/css' href='../src/tgs.css'>";

echo "<table id='user'>";
echo "<tr>";
//echo "<tr id='magaso'> <th > Triggers Perfil</th></tr>";
echo "<th>ID</th>";
echo "<th>ID USUARIO</th>";
echo "<th>NOMBRE</th>";
echo "<th>APELLIDO</th>";
echo "<th>FECHA NACIMIENTO</th>";
echo "<th>ID DE GENERO</th>";
echo "<th>FECHA DE ACTUALIZACION</th>";
echo "<th>USUARIO QUE ACTUALIZA</th>";
echo "</tr>";

foreach ($resultados1 as $resultado1) {
    echo "<tr>";
    echo "<td>" . $resultado1['id'] . "</td>";
    echo "<td>" . $resultado1['user_id'] . "</td>";
    echo "<td>" . $resultado1['nombre'] . "</td>";
    echo "<td>" . $resultado1['apellido'] . "</td>";
    echo "<td>" . $resultado1['fecha_nacimiento'] . "</td>";
    echo "<td>" . $resultado1['genero_id'] . "</td>";
    echo "<td>" . $resultado1['fecha_actualizacion'] . "</td>";
    echo "<td>" . $resultado1['usuario_actualizacion'] . "</td>";
    echo "</tr>";
}

echo "</table>";
echo "<link rel='stylesheet' type='text/css' href='../src/tgs.css'>";

// Cierra la conexión a la base de datos cuando hayas terminado


