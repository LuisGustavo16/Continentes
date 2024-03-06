<?php
require '../init.php';
$PDO = db_connect();

$sql = "SELECT C.id, C.nome from continentes as C";

$stmt = $PDO->prepare($sql);
$stmt->execute();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="../../CSS/style.css">
</head>

<body>
    <div class="header">
        <a class="inicio" href="../../index.html">Inicio</a>
    </div>

    <div class="tabela">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($continentes = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
                    <tr>
                        <td scope="row">
                            <?php echo $continentes['id'] ?>
                        </td>
                        
                        <td>
                            <?php echo $continentes['nome'] ?>
                        <td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

</body>

</html>