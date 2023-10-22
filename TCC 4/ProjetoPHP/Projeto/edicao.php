<?php

if (!isset($_GET["cpfUsuario"])) {
    echo "Selecione o usuário a ser editado!";
} else {
    $cpf = $_GET["cpfUsuario"];    

    try {
        include("conexaoBD.php");
        $stmt = $pdo->prepare('select * from telaCadastro where cpf = :cpf');
        $stmt->bindParam(':cpf', $cpf);
        $stmt->execute();

        $fem = "";
        $mas = "";
        $nda = "";
     

        while ($row = $stmt->fetch()) {
            $nome = $row['nome'];
            $telefone = $row['telefone'];
            $sexo = $row['sexo'];            

            //para setar o curso correto no combo
            if ($row['sexo'] == "Feminino") {
                $fem = "selected";
            } else if ($row['sexo'] == "Masculino") {
                $mas = "selected";
            } else if ($row['sexo'] == "Prefiro não informar") {
                $nda = "selected";

            }            
        }

    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
    }

    $pdo = null;
}
?>

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

    <form method="post" action="altera.php">

        Nome:<br>
        <input type='text' size='30' name='nome' value='<?= $nome ?>'><br><br>

        CPF:<br>
        <input type='text' size='11' name='cpf' value='<?= $cpf ?>' readonly><br><br>

        Telefone:<br>
        <input type="telefone" size="30" name="telefone"  value='<?= $telefone ?>' ><br><br>



        Sexo:<br>
        <select name='sexo'>
            <option></option>
            <option value='fem' <?= $fem ?>>Feminino</option>
            <option value='mas' <?= $mas ?>>Masculino</option>
            <option value='nda' <?= $nda ?>>Prefiro não informar</option>

         </select><br><br>       

         <input type='submit' value='Salvar Alterações'>        
    </form>   
    <hr>
</body>
</html>