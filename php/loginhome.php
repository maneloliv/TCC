<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="../images/logo.png"/>
    <title>𝙽𝙰𝚃𝙺𝙾𝚂 ➜ 𝙻𝙾𝙶𝙸𝙽</title>
    <style>
    body {
        font-family: Verdana, Geneva, Tahoma, sans-serif;
        background-image: url(../images/natural-cosmetics-on-desk.jpg);
        background-size: 100%;
        justify-content: center;
        display: flex;
    }

    .tela-login {
        background-color: rgba(0, 0, 0, 0.5);
        position: relative;
        padding: 50px;
        border-radius: 15px;
        margin-top: 250px;
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
        
    }

    fieldset {
        border: 0px solid #D7C3B3;
    }

    .index {
        text-align: center;
    }
    </style>
</head>

<body>
    <div class="tela-login">
        <fieldset>
            <form action="validarlogin.php" method="post">
                <legend>
                    <h3>Login</h3>
                </legend>
                
                <br>
                
                <label for="email" style="color: white;">Email: </label><br><p>
                <input type="text" name="email" id="email" placeholder="E-mail" required>
                
                <br><br>
                
                <label for="senha" style="color: white;">Senha: </label><br><p>
                <input type="password" name="senha" id="senha" placeholder="Senha" required>
                
                <br><br><br>
                
                <div>
                    <input type="submit" class="botao-entrar" style="font-weight: bolder;" value="Entrar">
                </div>
                
                <div>
                    <br>
                    <h6 style="color: whitesmoke; text-align: center;">Não possuí conta?<p></p><a
                            href="cadastrohome.php"
                            style="color: #00C53B; align-items: center; font-size: x-small;">Cadastrar-se</a></h6>
                </div>

                <div class="index">
                    <a href="index.php"><img src="../images/botao-de-inicio.png"/></a>
                </div>

            </form>
            </form>
        </fieldset>
    </div>
</body>

</html>