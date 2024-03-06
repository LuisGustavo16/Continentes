<?php
require_once '../init.php';
// pega os dados do formuário
$continente_nome = isset($_POST['nome']) ? $_POST['nome'] : null;

// validação (bem simples, só pra evitar dados vazios)
if (empty($continente_nome)) {
    echo "Volte e preencha todos os campos";
    exit;
}

// insere no banco
$PDO = db_connect();
$sql = "INSERT INTO continentes(nome) VALUES(:continente_nome)";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':continente_nome', $continente_nome);

if ($stmt->execute()) {
    echo "Gravado com sucesso";
} else{
    echo "Erro ao cadastrar";
    print_r($stmt->errorInfo());
}
?>