<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="IE-edge">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <title>Cadastro de Usuário</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <style>

@import url('https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600&display=swap');

        #sucess {
            color: green;
            font-weight: bold;
        }

        #error {
            color: red;
            font-weight: bold;
        }

        #warning {
            color: orange;
            font-weight: bold;
        }

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

    .cadastrar {
        width: 50%;
        margin-top: 2.5rem;
        border: none;
        background-color:#FFB6C1 ;
        padding: 0.62rem;
        border-radius: 5px;
        cursor: pointer;
        justify-content: space-between;
  }

  .cadastrar {
    background-color: #FFB6C1;
  }

.cadastrar {
    text-decoration: none;
    font-size: 0.93rem;
    font-weight: 500;
    color: #fff;
}

.select{
    margin: 0.6rem 0 ;
        padding: 0.8rem 1.2rem;
        border: none;
        border-radius: 10px;
        box-shadow: 1px 1px 6px #FFB6C1;
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


    
        <h1><i class="bi bi-card-list"></i>Cadastro de Usuário</h1>
     </div>

   
        <form method="post">

            <div class="input-group">

                <div class="input-box">
                <label for="firstname"><i class="bi bi-person-circle"></i>Nome:</label>
                <input type="text" size="30" name="nome" placeholder="Digite seu nome"><br><br>
                </div>


                <div class="input-box">
                <label for="cpf"><i class="bi bi-person-circle"></i>CPF:</label>
                <input type="cpf" size="11" name="cpf" placeholder="Digite seu cpf"><br><br>
                </div>


                <div class="input-box">
                <label for="telefone"><i class="bi bi-at"></i>Telefone:</label>
                <input type="telefone" size="30" name="telefone" placeholder="Digite seu telefone"><br><br>
                </div>

                <div class="input-box">
                <label for="data"><i class="bi bi-person-circle"></i>Data:</label>
                <input type="text" size="30" name="data" placeholder="xx/xx/xxxx" required><br><br>
                </div>


                <div class="input-box">
                <label for="email"><i class="bi bi-person-circle"></i>Email</label>
                <input type="text" size="30" name="email" placeholder="Digite seu email"><br><br>
                </div>

                <div class="input-box">
                <label for="senha"><i class="bi bi-person-circle"></i>Senha:</label>
                <input type="text" size="30" name="senha" placeholder="Digite seu senha"><br><br>
                </div>                                

                <div class="input-box">
                <label for="sexo"><i class="bi bi-person-circle"></i>Sexo:</label>
                <select class="select" name="sexo">
                    <option></option>
                    <option value="fem">Feminino</option>
                    <option value="mas">Masculino</option>
                    <option value="nda">Prefiro não informar</option>
                </select><br><br>
                </div>

                <div class="input-box">
                <input class="cadastrar" type="submit" value="Cadastrar">
                </div>

                
            </div> 
            </div>
            </div> 
                  
        </form>
    


</body>
</html>

<?php  
if ($_SERVER["REQUEST_METHOD"] === 'POST') {
    try {
        $nome = $_POST["nome"];
        $cpf = $_POST["cpf"];
        $telefone = $_POST["telefone"];
        $data = $_POST["data"];
        $email = $_POST["email"];
        $senha = $_POST["senha"];
        $sexo = $_POST["sexo"];
        // Verifique se os campos obrigatórios foram preenchidos
        if (empty($nome) || empty($cpf)) {
            echo "<span id='warning'>Informe todos os campos!</span>";
        } else {
            include("conexaoBD.php");

            $stmt = $pdo->prepare("select * from telaLogin where cpf = :cpf");
            $stmt->bindParam(':cpf', $cpf);

            $stmt->execute();

            $rows = $stmt->rowCount();

            if ($rows <= 0) {
                $stmt = $pdo->prepare("insert into telaLogin (nome, cpf, celular, data, email, senha, sexo) values (:nome, :cpf, :celular, :data, :email, :senha, :sexo)");
                $stmt->bindParam(':nome', $nome);
                $stmt->bindParam(':cpf', $cpf);
                $stmt->bindParam(':telefone', $telefone);
                $stmt->bindParam(':data', $data);
                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':senha', $senha);             
                $stmt->bindParam(':sexo', $sexo);
                $stmt->execute();

                echo "<span id='success'>CPF Cadastrado!</span>";
            } else {
                echo "<span id='error'>CPF já existente!</span>";
            }
        }
    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
    }

    // Feche a conexão com o banco de dados após o uso
    $pdo = null;
}

?>