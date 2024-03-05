<?php
    require '../init.php';
    $PDO = db_connect();

    $sql = "SELECT C.id, C.nome from continente as C";
    
    $stmt = $PDO->prepare($sql);
    $stmt->execute();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
    <a href="../../index.html">Inicio</a>
    
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($continentes = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
                <tr>
                    <th scope="row"><?php echo $continentes['id'] ?></th>
                    <td><?php echo $continentes['nome'] ?></td>
                    <td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</body>
</html>