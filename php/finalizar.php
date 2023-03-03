<?php
session_start();
if (!isset($_SESSION['carrinho'])) {
    $_SESSION['carrinho'] = array();
}   
function limparCarrinho()
{

    unset($_SESSION['carrinho']);  
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="../images/logo.png"/>
    <title>𝙽𝙰𝚃𝙺𝙾𝚂 ➜ 𝚁𝙴𝙲𝙸𝙱𝙾</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>

<body style="background-color: #EAEDED; margin-top:150px">
<header>
        <h1 class="text-center">Finalizar pedido</h1>
        <hr>
    </header>
    <div class="container">
        <div class="card mt-5 ">
            <div class="card-body">
                <h2 class="box_main">Recibo</h2>
            </div>
        </div>
        <form action="carrinho.php?acao=up" method="post">
            <table class="table" style="background-color:#fff">
                <thead >
                    <tr >
                    
                        <th>Produto</th>
                        <th>Quantidade</th>
                        <th>Preço</th>
                        <th>Subtotal</th>
                      

                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php
                        if (count($_SESSION['carrinho']) == 0) {
                        ?>
                    <tr>
                        <td colspan="5">
                            <div>
                               <p style="padding: 5px 20px ; font-size: 30px;">Nada aqui!</p>
                            </div>
                            </td>
                    </tr>
                    <?php
                        } else {
                            require_once('conexao.php');
                            $total = 0;
                            //var_dump($_SESSION['carrinho']);
                            foreach ($_SESSION['carrinho'] as $id => $qtd) {
                                $sql        = "SELECT * FROM produtos WHERE id = $id";
                                //echo $sql;
                                $dados      = $conn->query($sql) or die(mysqli_error($conn));
                                $produto    = $dados->fetch_assoc();
                                $nome       = $produto['nome'];
                                $preco      = number_format($produto['preco'], 2, ',', '.');
                                $sub        = number_format($produto['preco'] * $qtd, 2, ',', '.');
                                $total      += floatval(str_replace('.', '', $sub));
                    ?>
                        <tr>
                            
                            <td><?php echo $nome; ?></td>
                            <td><?php echo $qtd; ?></td>
                            <td>R$<?php echo $preco; ?></td>
                            <td>R$<?php echo $sub; ?></td>
                        </tr>
                    <?php
                            }
                    ?>
                    <tr>
                        <td></td>
                        <td colspan="4" style="text-align: end; font-weight: bold; font-size: 20px;">Total:</td>
                        <td style="font-weight: bold;">R$<?php echo number_format($total, 2, ',', '.'); ?></td>
                    </tr>
                <?php
                            $_SESSION['total'] = $total;
                        }
                ?>
            </table>
        </form>
    </div>                    
    <?php
    require_once("conexao.php");

    if (isset($_SESSION['carrinho']) && isset($_SESSION['total'])) {
        if (is_numeric($_SESSION['total'])) {
            $valorVenda = $_SESSION['total'];
            $sqlInserirVenda = "INSERT INTO venda (valor) VALUES ($valorVenda)";
            $conn->query("$sqlInserirVenda");
            $idVenda = $conn->insert_id; //pegando o id da última venda realizada
            foreach ($_SESSION['carrinho'] as $id => $qtd) {
                $sqlInserirItensVenda = "INSERT INTO itensvenda(idvenda, idproduto, qtd) VALUES($idVenda, $id, $qtd)";
                $conn->query("$sqlInserirItensVenda");
            }
    ?>
            <div class="alert alert-success" role="alert">
                Venda realizada com sucesso!
            </div>
            <a class="btn btn-outline-dark buynow_bt" href="index.php">Voltar para Produtos</a>
        <?php
        }
        limparCarrinho();
    } else {
        ?>
        <div class="alert alert-warning" role="alert">
            Nenhum item foi escolhido para compra!
        </div>
        <a class="btn btn-outline-dark" href="index.php">Voltar para Produtos</a>
    <?php
    }
    ?>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>