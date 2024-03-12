<?php
require '../init.php';
$PDO = db_connect();

$sql = "SELECT C.id, C.nomeContinente from continentes as C";

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

    <div class="main">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th class="op">Opções</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($continentes = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
                    <tr>
                        <td class="id"> <?php echo $continentes['id'] ?> </td>
                        <td> <?php echo $continentes['nomeContinente'] ?><td>
                        <a class="opcoes apagar" href="deleteContinente.php?id=<?php echo $continentes['id'] ?>" onclick="return confirm('Tem certeza de que deseja remover?');">Remover</a>
                        <a class="opcoes editar" href="formEditContinente.php?id=<?php echo $continentes['id'] ?>">Editar</a></

                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

</body>

</html>