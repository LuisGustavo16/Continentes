<?php
require_once '../init.php';
// pega os dados do formuário
$pais_nome = isset($_POST['nome']) ? $_POST['nome'] : null;
$continente_nome = isset($_POST['continente']) ? $_POST['continente'] : null;

// validação (bem simples, só pra evitar dados vazios)
if (empty($pais_nome) || empty($continente_nome)) {
    echo "Volte e preencha todos os campos";
    exit;
}

// insere no banco
$PDO = db_connect();
$sql = "INSERT INTO paises(nome, id_continente) VALUES(:pais_nome, :continente_nome)";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':pais_nome', $pais_nome);
$stmt->bindParam(':continente_nome', $continente_nome);

if ($stmt->execute()) {
    header('Location: ../../mensagem.html');
} else{
    echo "Erro ao cadastrar";
    print_r($stmt->errorInfo());
}
?>