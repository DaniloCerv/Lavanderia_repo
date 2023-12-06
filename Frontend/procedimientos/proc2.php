<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Frontend/src/main.css">
    <link rel="stylesheet" href="../../Frontend/src/bootstrap/css/bootstrap.min.css">
    <title>Software S&L</title>
</head>

<body>
    <?php
    require_once('../../Backend/includes/header.php');
    require_once('../../Backend/conexion.php');

    // Variable para determinar si se deben mostrar los resultados
    $mostrarResultados = false;

    if (isset($_POST['consultar'])) {
        $result = $conn->query("CALL verOrdenesP()");
        $mostrarResultados = true;
        echo "El procedimiento almacenado verOrdenesP() se ejecutó";
    }

    if (isset($_POST['eliminar'])) {
        $mostrarResultados = false; // No mostrar resultados después de eliminar
    }
    ?>

    <section>
        <div class="container p-5 text-center">
            <h2>Tabla de ordenes</h2>
        </div>
        <div class="container p-5">
            <div class="row">
                <div>
                    <section class="intro">
                        <div class="gradient-custom-1 h-100">
                            <div class="mask d-flex align-items-center h-100">
                                <div class="container">
                                    <div class="row justify-content-center">
                                        <div class="col-12">
                                            <div class="table-responsive bg-white">
                                                <table class="table mb-0">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">id</th>
                                                            <th scope="col">FechaEntrada</th>
                                                            <th scope="col">FechaSalida</th>
                                                            <th scope="col">Nombre</th>
                                                            <th scope="col">Estado orden</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        if ($mostrarResultados && isset($result) && $result->num_rows > 0) {
                                                            while ($row = $result->fetch_assoc()) {
                                                                echo "<tr>";
                                                                echo "<td>" . $row["id_orden"] . "</td>";
                                                                echo "<td>" . $row["fechaentrada"] . "</td>";
                                                                echo "<td>" . $row["fechasalida"] . "</td>";
                                                                echo "<td>" . $row["nombre"] . "</td>";
                                                                echo "<td>" . $row["estado_nombre"] . "</td>";
                                                                echo "</tr>";
                                                            }
                                                        } elseif (!$mostrarResultados) {
                                                            echo "<tr><td colspan='5'>No se encontraron resultados.</td></tr>";
                                                        }
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
            <div class="row text-center pt-4">
                <form method="post" action="" id="callSec1">
                    <h3>Ver ordenes no pagadas</h3>
                    <button type="submit" id="button" name="consultar" class="btn btn-success">Consultar</button>
                    <button type="submit" id="button" name="eliminar" class="btn btn-danger">Eliminar</button>
                </form>
            </div>

        </div>
    </section>

    <?php
    require_once('../../Backend/includes/footer.php');
    ?>

    <script src="../../Frontend/src/bootstrap/js/bootstrap.bundle.js"></script>
</body>

</html>