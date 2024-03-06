<?php
    require '../init.php';
    $id = isset($_GET['id']) ? (int) $_GET['id'] : null;
    if (empty($id))
    {
        echo "ID para alteração não definido";
        exit;
    }
    $PDO = db_connect();
    $sql = "SELECT id, nome FROM paises WHERE id = :id";
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
</head>
<body>
    <form action="editPais.php" method="post">>
        <label for="nome">Nome: </label>
        <input type="text" name="nome" id="nome" value="<?php echo $pais['nome'] ?>">
        <input type="hidden" name="id" value="<?php echo $id ?>">
        
        <button type="submit">Enviar</button>
        <a href="index.html">Cancelar</a>
    </form>
</body>
</html>