<?php

if(isset($_POST['submit']))
{

    include_once('configLk.php');
    
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha1 = $_POST['senha'];
    $senha=md5($senha1);
    $telefone = $_POST['telefone'];
    $sexo = $_POST['genero'];
    $data_nasc = $_POST['datanasc'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];
    $endereco = $_POST['endereco'];
    $sql = "INSERT INTO usuarios(nome,email,senha,telefone,genero,datanasc,cidade,estado,endereco) 
    VALUES ('$nome','$email','$senha','$telefone','$sexo','$data_nasc','$cidade','$estado','$endereco')";
    $result = $conn->query($sql);
    echo "<script>alert('Cadastro inserido com sucesso.');</script>";
    echo "<script>window.location = 'loginhome.php';</script>";
    
    
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="../images/logo.png"/>
    <title>𝙽𝙰𝚃𝙺𝙾𝚂 ➜ 𝙲𝙰𝙳𝙰𝚂𝚃𝚁𝙾</title>
    <style>
    body {
        font-family: Verdana, Geneva, Tahoma, sans-serif;
        background-image: url(../images/natural-cosmetics-on-desk.jpg);
        background-size: 100%;
        justify-content: center;
        display: flex;
    }

    .box {
        background-color: rgba(0, 0, 0, 0.5);
        position: relative;
        padding: 50px;
        border-radius: 15px;
        top: 50px;
    }

    input {
        padding: 10px;
        border: none;
        outline: none;
        border-radius: 10px;
        font-size: 15px;
        background-color: white;
        width: 20vw;
    }

    ::placeholder {
        color: silver;
    }

    .botao-entrar {
        background-color: #00C53B;
        border: none;
        padding: 10px;
        width: 10vw;
        border-radius: 10px;
        font-size: 15px;
        cursor: pointer;
        margin: 0 auto;
        color: white;
        justify-content: center;
        display: flex;
    }

    .botao-entrar:hover {
        background-color: #00C53B;
        color: black;
    }

    legend {
        background-color: #00C53B;
        border: 1px solid #00C53B;
        color: white;
        border-radius: 10px;
        justify-content: center;
        display: flex;
        width: 100%;
    }

    fieldset {
        border: 0px solid #D7C3B3;
    }

    .index {
        text-align: center;
    }

    .select {
        padding: 10px;
        border: none;
        outline: none;
        border-radius: 10px;
        font-size: 15px;
        background-color: white;
        width: 20vw;
        justify-content: center;
        display: flex;
    }
    </style>
</head>

<body>
    <div class="box">
        <form action="cadastrohome.php" method="POST">
            <fieldset>
                <legend>
                    <h3>Cadastro</h3>
                </legend>

                <br>

                <div class="input" style="display: flex;">
                    <div class="input" style="margin-right: 30px;">
                        <label for="nome" class="labelInput" style="color: white;">Nome Completo:</label><p></p>
                        <input style="height: 15px;" type="text" name="nome" id="nome" class="inputUser" required placeholder="Insira seu nome completo">
                    </div>

                    <div class="input">
                        <label for="datanasc" style="color: white;">Data de Nascimento:</label><p></p>
                        <input style="height: 15px;" type="date" name="datanasc" id="datanasc" required>
                    </div>
                </div>

                <br>

                <div class="input" style="display: flex;">
                    <div class="input" style="margin-right: 30px;">
                        <label for="email" class="labelInput" style="color: white;">Email:</label><p></p>
                        <input style="height: 15px;" type="text" name="email" id="email" class="inputUser" required placeholder="Insira seu e-mail">
                    </div>

                    <div class="input">
                        <label for="cidade" class="labelInput" style="color: white;">Cidade:</label><br><p>
                        <input style="height: 15px;" type="text" name="cidade" id="cidade" class="inputUser" required placeholder="Insira sua Cidade">
                    </div>
                </div>

                <div class="input" style="display: flex;">
                    <div class="input" style="margin-right: 30px;">
                        <label for="senha" class="labelInput" style="color: white;">Senha:</label><br><p>
                        <input style="height: 15px;" type="password" name="senha" id="senha" class="inputUser" required placeholder="Insira uma senha">
                    </div>

                    <div class="input">
                        <label for="estado" class="labelInput" style="color: white;">Estado:</label><br><p>
                        <input style="height: 15px;" type="text" name="estado" id="estado" class="inputUser" required placeholder="Insira seu estado">
                    </div>
                </div>

                <div class="input" style="display: flex;">
                    <div class="input" style="margin-right: 30px;">
                        <label for="telefone" class="labelInput" style="color: white;">Telefone:</label><br><p>
                        <input style="height: 15px;" type="tel" name="telefone" id="telefone" class="inputUser" required placeholder="Insira seu telefone">
                    </div>    

                    <div class="input">
                        <label for="endereco" class="labelInput" style="color: white;">Endereço:</label><br><p>
                        <input style="height: 15px;" type="text" name="endereco" id="endereco" class="inputUser" required placeholder="Insira seu endereço">
                    </div>
                </div>

                <div>
                    <label value="genero" class="input" style="color: white;">Gênero:</label><p>
                    <select class="select" style="width: auto;"name="genero">
                    <option value="Masculino">Masculino</option>
                    <option value="Feminino">Feminino</option>
                    <option value="Outro">Outro</option>
                    </select>
                </div>

                <div>
                    <button type="submit" name="submit" id="submit" class="botao-entrar">Cadastrar</button>
                    
                </div>

                <div>
                    
                    <h6 style="color: whitesmoke; text-align: center;">Já possuí conta?<p></p><a
                            href="loginhome.php"
                            style="color: #00C53B; align-items: center; font-size: x-small;">Logar</a></h6>
                </div>

                <div class="index">
                    <a href="index.php"><img src="../images/botao-de-inicio.png"/></a>
                </div>

            </fieldset>
        </form>
    </div>
</body>

</html>