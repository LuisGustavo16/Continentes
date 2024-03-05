<?php
    require_once '../init.php';
    $PDO = db_connect();
    $sql = "SELECT id, nome FROM continente";
    $stmt = $PDO->prepare($sql);
    $stmt->execute();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Continente</title>
</head>
<body>
    <a href="../../index.html">Inicio</a>

    <form action="addContinente.php" method="post">

        <label for="nome">Nome do Continente</label>
        <input type="text" name="nome">

        <button type="submit">Enviar</button>
    </form>

</body>
</html>