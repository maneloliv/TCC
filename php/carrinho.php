
<?php
session_start();
if (!isset($_SESSION['carrinho'])) {
    $_SESSION['carrinho'] = array();
    $_SESSION['time'] = time();
}

//adicionar produto
if (isset($_GET['acao'])) {
    //adicionar carrinho
    if ($_GET['acao'] == 'add') {
        $id = intval($_GET['id']); //intval() verifica se o número vindo é um inteiro
        if (!isset($_SESSION['carrinho'][$id])) {
            $_SESSION['carrinho'][$id] = 1;
            $_SESSION['time'] = time();
        } else {
         if(time() -  $_SESSION['time'] > 2){          
           $_SESSION['carrinho'][$id]++;
           $_SESSION['time'] = time();
         }
        }
    }
    //remover produto
    if ($_GET['acao'] == 'del') {
        $id = intval($_GET['id']); //intval() verifica se o número vindo é um inteiro
        if (isset($_SESSION['carrinho'][$id])) {
            unset($_SESSION['carrinho'][$id]);
        }
    }

    //atualizar carrinho
    if ($_GET['acao'] == 'up') {
        if (is_array($_POST['prod'])) {
            foreach ($_POST['prod'] as $id => $qtd) {
                //intval() verifica se o número vindo é um inteiro
                //trim() remove o caracter indicado
                $id = intval(trim($id, "'"));
                $qtd = intval($qtd);
                if (!empty($qtd) || $qtd <> 0) {
                    $_SESSION['carrinho'][intval($id)] = $qtd;
                } else {
                    unset($_SESSION['carrinho'][$id]);
                }
            }
        }
    }
}


?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
<meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <link rel="icon" type="image/png" href="../images/logo.png"/>
      <title>𝙽𝙰𝚃𝙺𝙾𝚂 ➜ 𝙲𝙰𝚁𝚁𝙸𝙽𝙷𝙾</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
      <link rel="stylesheet" type="text/css" href="../css/style.css">
      <link rel="stylesheet" href="../css/responsive.css">
      <link rel="icon" href="../images/fevicon.png" type="image/gif" />
      <link rel="stylesheet" href="../css/jquery.mCustomScrollbar.min.css">
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
      <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      <link href="https://fonts.googleapis.com/css?family=Great+Vibes|Poppins:400,700&display=swap&subset=latin-ext" rel="stylesheet">
      <!-- Google Font -->
      <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@600&display=swap" rel="stylesheet">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">

</head>



<body style="background-color: #EAEDED; margin-top:150px">

    <div class="container">
    
        <div class="card mt-5 " >
            <div class="card-body">
                <h2 class="box_main">Meu Carrinho</h2>
            </div>
        </div>

        <form action="carrinho.php?acao=up" method="post">
            <table class="table table-hover" style="background-color:#fff">
                <thead style="background-color:#00c53b; color: #fff">
                    <tr >
                        <th>Imagem</th>
                        <th>Produto</th>
                        <th>Quantidade</th>
                        <th>Preço</th>
                        <th>Subtotal</th>
                        <th>Ação</th>

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
                            <td><img src="../images/<?php echo $produto['imagem'] ?>" alt="Imagem do produto" style="max-width: 70px"></td>
                            <td><?php echo $nome; ?></td>
                            <td>
                                <input type="text" size="3" name="prod['<?php echo $id; ?>']" value="<?php echo $qtd; ?>">
                                <button class="btn btn-primary" type="submit">OK</button>
                            </td>
                            <td>R$<?php echo $preco; ?></td>
                            <td>R$<?php echo $sub; ?></td>
                            <td><a class="btn btn-danger" href="?acao=del&id=<?php echo $id; ?>">Remover</a></td>

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

            <a class="btn btn-outline-dark" href="index.php">Voltar para Produtos</a>
            <?php
            if (isset($_SESSION["nomeUsuario"])) {



                ?>
            <div class="buynow_bt"><a href="finalizar.php">Finalizar </a></div>
            <?php
            }else{
                ?>
                <div class="buynow_bt"><a href="loginhome.php">Faça login para finalizar a compra</a></div>
                <?php
            }
            ?>

        </form>


    </div>                    
<!--Links Js--> 
      <script src="../js/jquery.min.js"></script>
      <script src="../js/popper.min.js"></script>
      <script src="../js/bootstrap.bundle.min.js"></script>
      <script src="../js/jquery-3.0.0.min.js"></script>
      <script src="../js/plugin.js"></script>
      <script src="../js/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="../js/custom.js"></script>
      <script>
         function openNav() {
           document.getElementById("mySidenav").style.width = "250px";
         }
         
         function closeNav() {
           document.getElementById("mySidenav").style.width = "0";
         }

         function product(){
             const product = document.getElementById("Prod");
            product.scrollIntoView({behavior:"smooth"})
          }   
      </script>
</body>

</html>