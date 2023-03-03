<!DOCTYPE html>
<html lang="pt-br">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <link rel="icon" type="image/png" href="../images/logo.png"/>
      <title>𝙽𝙰𝚃𝙺𝙾𝚂 ➜ 𝙷𝙾𝙼𝙴</title>
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
   <body style="background-image: url(../images/natural-cosmetics-on-desk.jpg); background-size: 100%;">
   <?php session_start(); ?>   
   <?php include 'Navbar.php'; ?>
   <?php include 'Carrousel.php'; ?>
      <!--Navbar FIM-->


      <!-- Produtos Começo-->

   <div class="container-fluid">
      <div class="row">
      <?php
        require_once 'conexao.php';
        if(!empty($_GET['search'])){

          $data = $_GET['search'];
          $sql = "SELECT * FROM produtos WHERE id LIKE '%$data%' or nome LIKE '%$data%' or preco LIKE '%$data%' ORDER BY id";
        }else{
          $sql = "SELECT * FROM produtos ORDER BY id";
        }
        $dados = $conn->query($sql) or die("Erro ao executar comando: " . mysqli_error($conn));
        while ($produto = $dados->fetch_assoc()) {
      ?>

  <div class="col-sm-4" >
    <div class="box_main">
    <h5 class="shirt_text"><?php echo $produto['nome']; ?></h5>
     <img src="../images/<?php echo $produto['imagem'] ?>" alt="Imagem do produto">
      <div class="card-body">
        <p class="price_text">R$<?php echo number_format($produto['preco'], 2, ',', '.'); ?></p>
        <div class="buy_bt"><a href="Produto.php?id=<?php echo $produto['id'] ?>">Comprar</a></div>
      </div>
    </div>
  </div> 
  <?php
      }
   ?>

</div>
</div>
<!--Footer-->   
<?php include 'Footer.php'; ?>



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
         function openUsu() {
           document.getElementById("mySideUsu").style.width = "250px";
         }
         
         function closeNav() {
           document.getElementById("mySidenav").style.width = "0";
         }
         function closeUsu() {
           document.getElementById("mySideUsu").style.width = "0";
         }

         function product(){
             const product = document.getElementById("Prod");
            product.scrollIntoView({behavior:"smooth"})
          }   
      </script>



   </body>
</html>