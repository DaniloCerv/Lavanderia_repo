<?php
// Incluye el archivo de conexión
require_once('../../Backend/conexion.php');

// Aquí puedes realizar tus consultas y operaciones con la base de datos utilizando la conexión $conn

// Prepara la consulta con marcadores de posición
$sql = "SELECT id, username, email, rol_id, estado_id, tipo_usuario_id, created_at, updated_at FROM user";
$stmt = $conn->prepare($sql);

if ($stmt) {
    // Ejecuta la consulta
    $stmt->execute();

    // Almacena los resultados en un arreglo
    $resultados = array();
    $stmt->bind_result($id, $username, $email, $rol_id, $estado_id, $tipo_usuario_id, $created_at, $updated_at);
    while ($stmt->fetch()) {
        $resultado = array(
            'id' => $id,
            'username' => $username,
            'email' => $email,
            'rol_id' => $rol_id,
            'estado_id' => $estado_id,
            'tipo_usuario_id' => $tipo_usuario_id,
            'created_at' => $created_at,
            'updated_at' => $updated_at
        );
        $resultados[] = $resultado;
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


echo "<table id='user'>";
echo "<tr>";
echo "<th>ID</th>";
echo "<th>USUARIO</th>";
echo "<th>EMAIL</th>";
echo "<th>ROL</th>";
echo "<th>ESTADO</th>";
echo "<th>TIPO USUARIO</th>";
echo "<th>FECHA DE CREACION</th>";
echo "<th>FECHA DE ACTUALIZACION</th>";
echo "</tr>";

foreach ($resultados as $resultado) {
    echo "<tr>";
    echo "<td>" . $resultado['id'] . "</td>";
    echo "<td>" . $resultado['username'] . "</td>";
    echo "<td>" . $resultado['email'] . "</td>";
    echo "<td>" . $resultado['rol_id'] . "</td>";
    echo "<td>" . $resultado['estado_id'] . "</td>";
    echo "<td>" . $resultado['tipo_usuario_id'] . "</td>";
    echo "<td>" . $resultado['created_at'] . "</td>";
    echo "<td>" . $resultado['updated_at'] . "</td>";
    echo "</tr>";
}

echo "</table>";

