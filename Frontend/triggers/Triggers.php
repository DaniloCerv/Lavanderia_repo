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
    <link rel="stylesheet" href="../src/tgs.css">
    <script src="../js/triggers.js"></script>
    
    <style>
        #Button {
            padding: 1.3em 3em;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 2.5px;
            font-weight: 500;
            color: #000;
            background-color: #fff;
            border: none;
            border-radius: 45px;
            box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease 0s;
            cursor: pointer;
            outline: none;
        }

        #Button:hover {
            background-color: #23c483;
            box-shadow: 0px 15px 20px rgba(46, 229, 157, 0.4);
            color: #fff;
            transform: translateY(-7px);
        }

        #Button:active {
            transform: translateY(-1px);
        }

        #titulo {
            text-align: left;
            font-family: Comic Sans MS;
            font-weight: bold;
            font-size: 30px;
            color: #fff;
            text-shadow: -1px 1px 0 #414D68, 2px 2px 0 #414D68, 3px 3px 0 #414D68, 4px 4px 0 #414D68, 2px 2px 0 #414D68, 3px 4px 0 #414D68, 4px 4px 0 #414D68, 4px 4px 0 #414D68, 5px 5px 0 #414D68;
        }

        .container {
            margin: 20px;
            font-size: 16px;
        }

        @media (max-width: 600px) {
            .container {
                font-size: 14px;
            }
        }
    </style>



</head>


<body>



    <?php
    require_once('../../Backend/includes/header.php');
    

    ?>
    <section>





        <div class="container">
            <H1 id="titulo"> Estos son los triggers para los usuarios</H1>
            <br>
            <br>
            <button id="Button" onclick="usertriggers()">Mostrar</button>

            <br>
            <br>
            <div id="contenido" style="display: none;">
                <?php
                include 'tgsuser.php';

                ?>
            </div>
        </div>
        <br>
        <br>

        <div class="container">
            <H1 id="titulo"> Estos son los triggers para la actualizacion de los Perfiles</H1>
            <br>
            <br>
            <button id="Button" onclick="perfiltriggers()">Mostrar</button>
            <br>
            <br>
            <div id="contenido1" style="display: none;">
                <?php
                include 'tgsperfil.php';

                ?>
            </div>
        </div>
        <br>
        <br>

        <div class="container">
            <H1 id="titulo"> Estos son los triggers para la actualizacion de los Tipos de Servicio</H1>
            <br>
            <br>
            <button id="Button" onclick="tserviciotriggers()">Mostrar</button>

            <br>
            <br>
            <div id="contenido2" style="display: none;">
                <?php
                include 'tgstiposervicio.php';

                ?>
            </div>
        </div>

    </section>







    <?php
    require_once('../../Backend/includes/footer.php');
    ?>


    <script src="../../Frontend/src/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>