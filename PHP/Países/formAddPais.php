<?php
    require_once '../init.php';
    $PDO = db_connect();
    $sql = "SELECT id, nome FROM continentes";
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

    <div class="tabela">
        <form action="addPais.php" method="post">

            <label for="nome">Nome do Pais</label>
            <input type="text" name="nome"> <br> <br>

            <label for="continente">Continente do País</label>
            <select type="checkbox" name="continente">

            <?php while($paises = $stmt->fetch(PDO::FETCH_ASSOC)):?>

                <option value="<?php echo $paises['id'] ?>"><?php echo $paises['nome'] ?></option>
                
            <?php endwhile; ?>
            </select> <br> <br>

            <button type="submit">Enviar</button>
        </form>
    </div>
</body>
</html>