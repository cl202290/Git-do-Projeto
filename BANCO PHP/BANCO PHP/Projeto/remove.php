<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> Controle de Usuário</title>
</head>

<body>

<a href="index.html">Home</a> | <a href="telaConsulta.php">Consulta</a>
<hr>

<h2>Exclusão de Usuário</h2>

<?php

if (!isset($_GET["cpfUsuario"])) {
    echo "Selecione o CPF a ser excluído!";
} else {
    $cpf = $_GET["cpfUsuario"];

    try {

        include("conexaoBD.php");

        $stmt = $pdo->prepare('delete from telaCadastro where cpf = :cpf');
        $stmt->bindParam(':cpf', $cpf);
        $stmt->execute();

        echo $stmt->rowCount() . " Usuário(s) de CPF $cpf removido!";

    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
    }

    $pdo = null;
}

?>

</body>
</html>