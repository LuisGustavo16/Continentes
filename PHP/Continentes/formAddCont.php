<?php
require_once '../init.php';
$PDO = db_connect();
$sql = "SELECT id, nomeContinente FROM continentes";
$stmt = $PDO->prepare($sql);
$stmt->execute();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Continente</title>
    <link rel="stylesheet" href="../../CSS/style.css">
</head>

<body>
    <div class="header">
        <a class="inicio" href="../../index.html">Inicio</a>
    </div>

    <div class="main">
        <form action="addContinente.php" method="post">

            <label for="nome">Nome do Continente</label>
            <input type="text" name="nome">

            <button class="enviar" type="submit">Enviar</button>
        </form>
    </div>

</body>

</html>