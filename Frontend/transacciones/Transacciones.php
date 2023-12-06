<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <link rel="stylesheet" href="../src/transaccion.css">
    <link rel="stylesheet" href="../src/main.css">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    
    <title>Transacciones</title>
</head>

<body>
    <!-- <div class="cabecera">
        <div class="imagen-logo">
            <img src="../img/itsva_2".jpg" alt="itsva" style="justify-self: center;">
        </div>
    </div> -->

    <?php
    require_once('../../Backend/includes/header.php');
    

    ?>


   
    <section id="transacciones">
        <h3 style="font-weight: bold; width: 100%; text-align:center;">Transacciones</h3>
        <div id="primera">
            <?php
            include 'firstTransaction.php';
            ?>
        </div>
        <div id="segunda">
            <?php
            include 'secondTransaction.php';
            ?>
        </div>
    </section>

    <?php
    require_once('../../Backend/includes/footer.php');
    ?>

    <script src="../../Frontend/src/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>