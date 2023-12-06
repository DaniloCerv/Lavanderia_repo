<link rel="stylesheet" href="../src/transaccion.css">
<div id="first-transaction">
    <?php
   
    require_once('../../Backend/conexion.php');
    $resConsulta;

    function consultar($conn, $id_cliente)
    {
        $consulta = "SELECT * FROM clientes WHERE id_cliente = $id_cliente";
        $resConsulta = $conn->query($consulta);
        if (!$resConsulta) {
            throw new Exception("Error en la consulta: " . $conn->error);
        }
        $cliente = $resConsulta->fetch_assoc();
    ?>
        <table class="table" style="width: 100%;">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido</th>
                    <th scope="col">Telefono</th>
                    <th scope="col">Correo</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo $cliente['id_cliente']; ?></td>
                    <td><?php echo $cliente['nombre']; ?></td>
                    <td><?php echo $cliente['apellido']; ?></td>
                    <td><?php echo $cliente['telefono']; ?></td>
                    <td><?php echo $cliente['correo']; ?></td>
                </tr>
            </tbody>
        </table>
        <script>
            window.alert("Éxito en la consulta de los datos");
        </script>
    <?php
    }

    function eliminar($conn, $id_cliente)
    {
        $consulta = "DELETE FROM clientes WHERE id_cliente = $id_cliente";
        $resEliminar = $conn->query($consulta);
        if (!$resEliminar) {
            throw new Exception("Error al eliminar: " . $conn->error);
        }
    ?>
        <script>
            window.alert("Dato eliminado correctamente");
        </script>
    <?php
    }
    $conn->begin_transaction();
    try {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $id_cliente = $_POST['id_cliente'] ?? null;
            if (isset($_POST['consultar'])) {
                consultar($conn, $id_cliente); //Llamar método consultar
            } elseif (isset($_POST['eliminar'])) {
                eliminar($conn, $id_cliente); //Llamar método eliminar
            }
        }
        $conn->commit();
    } catch (Exception $e) {
        $conn->rollback();
        echo "Error en la operación: " . $e->getMessage();
    }
    ?>
    <form method="post" id="form-transaction-one">
        <h2>Consultar usuario</h2>
        <input type="text" id="id_cliente" class="input-group-text" name="id_cliente" required placeholder="id del usuario" style="width:100%">
        <button type="submit" id="button" name="consultar" class="btn btn-success">Consultar</button>
        <button type="submit" id="button" name="eliminar" class="btn btn-danger">Eliminar</button>
    </form>
</div>