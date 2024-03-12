<?php
    require '../init.php';
    $id = isset($_GET['id']) ? (int) $_GET['id'] : null;
    if (empty($id))
    {
        echo "ID para alteração não definido";
        exit;
    }
    $PDO = db_connect();
    $sql = "SELECT id, nomeContinente FROM continentes WHERE id = :id";
    $stmt = $PDO->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $pais = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!is_array($pais))
    {
        echo "Nenhum cadastro encontrado";
        exit;
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>
    <link rel="stylesheet" href="../../CSS/style.css">
</head>
<body>

    <div class="header">
        <a class="inicio" href="../../index.html">Inicio</a>
    </div>

    <div class="main">
        <form action="editContinente.php" method="post">
            <label for="nome">Nome: </label>
            <input type="text" name="nome" id="nome" value="<?php echo $pais['nomeContinente'] ?>">
            <input type="hidden" name="id" value="<?php echo $id ?>">
            
            <button class="enviar" type="submit">Enviar</button>
            <a class="opcoes apagar" href="../../index.html">Cancelar</a>
        </form>
    </div>
    
</body>
</html>