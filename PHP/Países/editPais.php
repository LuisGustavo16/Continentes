<?php
    require_once '../init.php';
    $id = isset($_POST['id']) ? $_POST['id'] : null;
    $nome = isset($_POST['nome']) ? $_POST['nome'] : null;

    // validação (bem simples, só pra evitar dados vazios)
    if (empty($nome))
    {
        echo "Volte e preencha todos os campos";
        exit;
    }
    $PDO = db_connect();
    $sql = "UPDATE paises SET nomePais = :nome WHERE id = :id";
    $stmt = $PDO->prepare($sql);
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    if ($stmt->execute())
    {
        header('Location: ../../mensagem.html');
    }
    else
    {
        echo "Erro ao alterar!";
        print_r($stmt->errorInfo());
    }
?>