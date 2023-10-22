<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Controle de Usuário</title>
</head>

<body>

<a href="index.html">Home</a> | <a href="telaConsulta.php">Consulta</a>
<hr>

<h2>Edição de Usuário</h2>

</body>
</html>

<?php

        $nome = $_POST["nome"];
        $cpf = $_POST["cpf"];
        $telefone = $_POST["telefone"];
        $sexo = $_POST["sexo"];

    try {

        include("conexaoBD.php");

        $stmt = $pdo->prepare('update telaCadastro set nome = :novoNome, telefone = :novoTelefone, sexo = :novoSexo where cpf = :cpf, ');

        $stmt->bindParam(':novoNome', $novoNome);
        $stmt->bindParam(':novoTelefone', $novoTelefone);
        $stmt->bindParam(':novoSexo', $novoSexo);
        $stmt->bindParam(':cpf', $cpf);
        
        $stmt->execute();

        echo "Os dados do usuário de CPF $cpf foram alterados!";

    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
    }

    $pdo = null;
?>