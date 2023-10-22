<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<title>Consulta de Usuário</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

	<style type="text/css">

*{
        padding: 0;
        margin: 0;
        box-sizing: border-box;
        font-family: "Inter", sans-serif;
    }

    body{
        width: 100%;
        height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        background:#FFB6C1 ;
    }
        
    .form{
        width: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        background-color:#fff ;
        padding: 3rem;
    }

    .form-header{
        margin-bottom: 2rem;
        display: flex;
        justify-content: space-between;

    }

    .form-header h1::after{
        content: "";
        display: block;
        width: 5rem;
        height: 0.3rem;
        background-color:#FFB6C1;
        margin: 0auto;
        position: absolute;
        border-radius: 10px;
    }

    .input.group {
        display:  flex;
        flex-wrap: wrap;
        justify-content: space-between;
        padding: 1rem 0;
    }

    .input.box{
        display: flex;
        flex-direction: column;
        margin-bottom: 1.1rem;
    }

    .input-box input{
        margin: 0.6rem 0 ;
        padding: 0.8rem 1.2rem;
        border: none;
        border-radius: 10px;
        box-shadow: 1px 1px 6px #FFB6C1;
    }

    .input-box input:hover{
        background-color: #FFB6C1;
    }

    .input-box input:focus-visible{
        outline: 1px solid #6c63ff;
    }

    .input-box label,.gender-title{
        font-size: 0.75rem;
        font-weight: 600;
        color:#000000c0 ;
    }
    
    .input-box input::placeholder{
        color:#000000be ;
    }

    .consultar {
        width: 50%;
        margin-top: 2.5rem;
        border: none;
        background-color:#FFB6C1 ;
        padding: 0.62rem;
        border-radius: 5px;
        cursor: pointer;
        justify-content: space-between;
  }

  .consultar {
    background-color: #FFB6C1;
  }

.consultar {
    text-decoration: none;
    font-size: 0.93rem;
    font-weight: 500;
    color: #fff;
}

@media screen and (max-width: 1330px) {
    .form-image {
        display: none;
    }
    .container {
        width: 50%;
    }
    .form {
        width: 100%;
    }
}

@media screen and (max-width: 1064px) {
    .container {
        width: 90%;
        height: auto;
    }
  }

  .icone{
            padding-left: 30px;
        }



	</style>

</head>
<body>



    <div class="form">

		<div class="title">
        <div class="icone">
           <a href="index.html" style="font-size: 15px;"><i class="bi bi-house-fill" style="color: #FFB6C1;">home</i></a>
        </div>

        <div class="form-header">
			<h1><i class="bi bi-card-list"></i>Consulta de Usuário</h1>
		</div>
		
		<form method="post">

			
			<div class="input-box">
            	<label for="cpf"><i class="bi bi-person-circle"></i>CPF:</label>
				<input type="text" size="11" name="cpf" placeholder="Digite CPF">
			</div>

			<div class="input-box">
			<input class="consultar" type="submit" value="Consultar">
		</div>
			
		</form>

	</div>

</body>
</html>

<?php
    if ($_SERVER["REQUEST_METHOD"] === 'POST') {      

    include("conexaoBD.php");

    if (isset($_POST["nome"]) && (trim($_POST["cpf"]) != "")){

    	$cpf = $_POST["cpf"];

    	$stmt = $pdo->prepare("select * from telaCadastro where cpf= :cpf");
    	$stmt->bindParam(':cpf', $cpf);

    } else {
    	$stmt = $pdo->prepare("select * from telaCadastro");
    }

    	try{


    		echo "<table  border='1px'  >";
    		echo  "<tr>";
    		echo "<th> Nome </th>";
    		echo "<th>CPF</th>";
    		echo "<th>Telefone</th>";
    		echo "<th>Sexo</th>";		
			echo "<th colspan=2></th>";
			echo "</th>";

			//buscando dados
    		$stmt->execute();

			while ($row = $stmt->fetch()){ //localiza e posiciona no banco
				echo "<tr>";
				echo "<td>" . $row['nome'] . "</td>";
				echo "<td>" . $row['cpf'] . "</td>";
				echo "<td>" . $row['telefone'] . "</td>";
				echo "<td>" . $row['sexo'] . "</td>";				

				//escrevendo dentro da td o link para -> remove.php?raAluno=3

				echo "<td>";
				echo "<a href='remove.php?cpfUsuario=";
				echo $row['cpf'];
				echo "'><img src='excluir.png' width='20px'>";
				echo "</a>";

				echo "<td>";
				echo "<a href='edicao.php?cpfUsuario=";
				echo $row['cpf'];
				echo "'><img src='editar.png' width='20px'>";
				echo "</a>";

				echo "</td>";
				echo "</tr>";				

			}

				echo "</table>";
    		//echo "string";

    	//	while ($row = stmt)

    	} catch (PDOException $e) {
    		echo 'Error: ' . $e->getMessage();
    	}

    	$pdo = null;

    } // fechamento do if do post  
?>