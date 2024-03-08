<?php
    require '../init.php';
    $PDO = db_connect();

    $sql = "SELECT id, nome, id_continente FROM paises";
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

    <div class="main t1">
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>País</th>
                <th>Continente</th>
                <th class="op">Opções</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($paises = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
                <tr>
                    <td><?php echo $paises['id'] ?></td>
                    <td><?php echo $paises['nome'] ?></td>
                    <td class="op"><?php echo $paises['id_continente'] ?></td>
                    <td class="op"><a class="opcoes apagar" href="deletePais.php?id=<?php echo $paises['id'] ?>" onclick="return confirm('Tem certeza de que deseja remover?');">Remover</a></td>
                    <td><a class="opcoes editar" href="formEditPaises.php?id=<?php echo $paises['id'] ?>">Editar</a></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
    </div>
</body>
</html>