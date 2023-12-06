<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Document</title>
    <!-- Agregar los estilos de Bootstrap desde el CDN de Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <!-- Opcional: Si necesitas usar íconos de Bootstrap, puedes agregar este CDN de Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="../src/main.css">
    <link rel="stylesheet" href="../src/main_2.css">
    
  

</head>


<body>
   


    <?php
    require_once('../../Backend/includes/header.php');
    require_once('../../Backend/conexion.php');

    ?>


    <h1 class="titulo"> SubConsultas</h1>

    <form action="subconsultas.php" method="POST">

        <div>
            <h3>-Selecciona los servicios en donde el subtotal sea mayor al promedio </h3>
            <button type="submit" name="btn1" class="btn btn-info" id="contenido">Ver</button>

            <br>
            <?php
            if (isset($_POST['btn1'])) {
                require_once('../../Backend/conexion.php');
                $resultados = mysqli_query($conn, "SELECT id_servdetalle,subtotal from servicio_detalle where subtotal> (SELECT AVG(subtotal)FROM servicio_detalle);");
                echo "<br>";
                echo "<h5>SELECT id_servdetalle,subtotal from servicio_detalle where subtotal> (SELECT AVG(subtotal)FROM servicio_detalle);</h5>";
                echo " <table>
                <tr>
                 <td><b><center>ID_Servdetalle</center></b></td>
                 <td><b><center>Subtotal</center></b></td>
                </tr>";
                while ($consulta = mysqli_fetch_array($resultados)) {
                    echo
                    "                     
                        <tr>
                         <td>" . $consulta['id_servdetalle'] . "</td>
                         <td>" . $consulta['subtotal'] . "</td>
                        </tr>
                    ";
                }
                echo " </table>";
                require_once('../../Backend/cerrar_conexion.php');
              
            }
            ?>
            <br>
        </div>




        <div>
            <h3>Selecciona los servicios en los que el cliente requiere el servicio de " ropa".</h3>
            <button type=" submit" name="btn2" class="btn btn-info">Ver</button>
            <br>
            <div id="contenido">
                <?php
                if (isset($_POST['btn2'])) {
                    require_once('../../Backend/conexion.php');
                    $resultados = mysqli_query($conn, "SELECT id_servdetalle,id_orden from servicio_detalle where id_tiposerv =(SELECT id_tiposerv from tipo_servicio where nombre = 'Ropa');");
                    echo "<br>";
                    echo "<h5>SELECT id_servdetalle,id_orden from servicio_detalle where id_tiposerv =(SELECT id_tiposerv from tipo_servicio where nombre = 'Ropa');</h5>";
                    echo " <table>
                <tr>
                 <td><b><center>ID_Servdetalle</center></b></td>
                 <td><b><center>ID_Orden</center></b></td>
                </tr>";
                    while ($consulta = mysqli_fetch_array($resultados)) {
                        echo
                        "                     
                        <tr>
                         <td>" . $consulta['id_servdetalle'] . "</td>
                         <td>" . $consulta['id_orden'] . "</td>
                        </tr>
                    ";
                    }
                    echo " </table>";
                    require_once('../../Backend/conexion.php');
                }
                ?>
                <br>
            </div>
        </div>



        <div>
            <h3>Selecciona los servicios en la cual el cliente ya ha pagado su servicio.</h3>
            <button type=" submit" name="btn3" class="btn btn-info">Ver</button>
            <br>
            <?php
            if (isset($_POST['btn3'])) {
                require_once('../../Backend/conexion.php');
                $resultados = mysqli_query($conn, "SELECT id_cliente,nombre,apellido from clientes where id_cliente IN(SELECT id_cliente from ordenes where id_estadoserv = 1);");
                echo "<br>";
                echo "<h5>
                SELECT id_cliente,nombre,apellido from clientes where id_cliente IN(SELECT id_cliente from ordenes where id_estadoserv = 1);</h5>";
                echo " <table>
                <tr>
                 <td><b><center>ID_Cliente</center></b></td>
                 <td><b><center>Nombre</center></b></td>
                 <td><b><center>Apellido</center></b></td>
                </tr>";
                while ($consulta = mysqli_fetch_array($resultados)) {
                    echo
                    "                     
                        <tr>
                         <td>" . $consulta['id_cliente'] . "</td>
                         <td>" . $consulta['nombre'] . "</td>
                         <td>" . $consulta['apellido'] . "</td>
                        </tr>
                    ";
                }
                echo " </table>";
                require_once('../../Backend/conexion.php');
            }
            ?>
            <br>
        </div>



        <div>
            <h3>Seleciona en donde los servicios entraron despues de las 19hrs.</h3>
            <button type=" submit" name="btn4" class="btn btn-info">Ver</button>
            <br>
            <?php
            if (isset($_POST['btn4'])) {
                require_once('../../Backend/conexion.php');
                $resultados = mysqli_query($conn, "SELECT id_cliente,nombre,apellido from clientes where id_cliente IN(SELECT id_cliente from ordenes where fechaentrada > '2023-12-02 19:00:00');");
                echo "<br>";
                echo "<h5>SELECT id_cliente,nombre,apellido from clientes where id_cliente IN(SELECT id_cliente from ordenes where fechaentrada > '2023-12-02 19:00:00');</h5>";
                echo " <table>
                <tr>
                <td><b><center>ID_Cliente</center></b></td>
                 <td><b><center>Nombre</center></b></td>
                 <td><b><center>Apellido</center></b></td>
                </tr>";
                while ($consulta = mysqli_fetch_array($resultados)) {
                    echo
                    "                     
                    <tr>
                    <td>" . $consulta['id_cliente'] . "</td>
                    <td>" . $consulta['nombre'] . "</td>
                    <td>" . $consulta['apellido'] . "</td>
                   </tr>
                    ";
                }
                echo " </table>";
                require_once('../../Backend/conexion.php');
            }
            ?>
            <br>
        </div>



        <div>
            <h3>-selecciona los servicios hechos por el usuario 9</h3>
            <button type=" submit" name="btn5" class="btn btn-info">Ver</button>
            <br>
            <?php
            if (isset($_POST['btn5'])) {
                require_once('../../Backend/conexion.php');
                $resultados = mysqli_query($conn, "SELECT *  from ordenes where id_orden IN (SELECT id_orden  FROM user_ordenes where id_user = 9)");
                echo "<br>";
                echo "<h5>SELECT *  from ordenes where id_orden IN (SELECT id_orden  FROM user_ordenes where id_user = 9);</h5>";
                echo " <table>
                <tr>
                 <td><b><center>ID_Orden</center></b></td>
                 <td><b><center>Fecha_Entrada</center></b></td>
                 <td><b><center>Fecha_Salida</center></b></td>
                 <td><b><center>ID_Cliente</center></b></td>
                 <td><b><center>ID_Estado_Servicio</center></b></td>
                </tr>";
                while ($consulta = mysqli_fetch_array($resultados)) {
                    echo
                    "                     
                        <tr>
                         <td>" . $consulta['id_orden'] . "</td>
                         <td>" . $consulta['fechaentrada'] . "</td>
                         <td>" . $consulta['fechasalida'] . "</td>
                         <td>" . $consulta['id_cliente'] . "</td>
                         <td>" . $consulta['id_estadoserv'] . "</td>
                        </tr>
                    ";
                }
                echo " </table>";
                require_once('../../Backend/conexion.php');
            }
            ?>
            <br>
        </div>

    </form>
   
    <?php
    require_once('../../Backend/includes/footer.php');
    ?>

    <script src="../../Frontend/src/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>