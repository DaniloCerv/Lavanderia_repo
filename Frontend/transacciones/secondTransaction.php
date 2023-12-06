<link rel="stylesheet" href="../src/transaccion.css">

<div id="second-transaction">
    <?php
    require_once('../../Backend/conexion.php');
    $consultaRes;
    function guardar($conn, $nombre, $descripcion, $precioConv)
    {
        $consulta = "INSERT INTO tipo_servicio (nombre, descripcion, preciokg) VALUES ('$nombre', '$descripcion', $precioConv)";
        $consultaRes = $conn->query($consulta);
        if (!$consultaRes) {
            throw new Exception("Error en al guardar los datos: " . $conn->error);
        }
    ?>
        <script>
            window.alert("La información se guardó correctamente");
        </script>
    <?php
    }
    $conn->begin_transaction();
    try {
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            $nombre = $_GET['nombre'] ?? null;
            $descripcion = $_GET['desc'] ?? null;
            $precio = $_GET['precio'] ?? null;
            $precioConv = floatval($precio);
            if ($nombre && $descripcion && $precio) {
                guardar($conn, $nombre, $descripcion, $precioConv); //Llamar método guardar
            } else {
                echo "<h3>No hay datos para envíar</h3>";
            }
        }
        $conn->commit();
    } catch (Exception $e) {
        $conn->rollback();
        echo "Error en la operación: " . $e->getMessage();
    }
    ?>
    <form method="get" id="form-transaction-two">
        <h2>Registrar tipo servicio</h2>
        <input class="input-group-text" type="text" placeholder="Nombre" name="nombre">
        <input class="input-group-text" type="text" placeholder="Descripción" name="desc">
        <input class="input-group-text" type="text" placeholder="Precio (kg)" name="precio">
        <button type="submit" class="btn btn-success">Guardar</button>
    </form>
</div>