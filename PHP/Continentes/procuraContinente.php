<?php
    require '../init.php';
    $nome = isset($_POST['nome']) ? $_POST['nome'] : null;
    if (empty($nome))
    {
        echo "Volte e preencha o campo para pesquisa!";
        exit;
    }
    $pesquisa = '%' . $nome . '%';
    $PDO = db_connect();
    $sql = "SELECT id, nomeContinente FROM continentes WHERE upper(nomeContinente) like :nome";
    $stmt = $PDO->prepare($sql);
    $stmt->execute([':nome' => $pesquisa]);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesquisa</title>
    <link rel="stylesheet" href="../../CSS/style.css">
</head>
<body>
    <div class="header">
        <a class="inicio" href="../../index.html">Inicio</a>
    </div>

    <div class="main">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th class="op">Opções</th>
                </tr>
            </thead>
            <tbody>
                
                <?php while ($continente = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
                    <tr>
                        <td><?php echo $continente['id'] ?></td>
                        <td><?php echo $continente['nomeContinente'] ?></td>
                        <td>
                            <a class="opcoes apagar" href="deleteContinente.php?id=<?php echo $continente['id'] ?>" onclick="return confirm('Tem certeza de que deseja remover?');">Remover</a>
                            <a class="opcoes editar" href="formEditContinente.php?id=<?php echo $continente['id'] ?>">Editar</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
    
</body>
</html>