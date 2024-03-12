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
$sql = "INSERT INTO continentes(nomeContinente) VALUES(:continente_nome)";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':continente_nome', $continente_nome);

if ($stmt->execute()) {
    header('Location: ../../mensagem.html');
} else{
    echo "Erro ao cadastrar";
    print_r($stmt->errorInfo());
}
?>