<?php
require_once '../init.php';
// pega os dados do formuário
$pais_nome = isset($_POST['selectPais']) ? $_POST['selectPais'] : null;

// validação (bem simples, só pra evitar dados vazios)
if (empty($pais_nome)) {
    echo "Volte e preencha todos os campos";
    exit;
}

// insere no banco
$PDO = db_connect();
$sql = "INSERT INTO pais(nome) VALUES(:pais_nome)";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':pais_nome', $pais_nome);

if ($stmt->execute()) {
    header('Location: msgSucesso.html');
} else{
    echo "Erro ao cadastrar";
    print_r($stmt->errorInfo());
}
?>