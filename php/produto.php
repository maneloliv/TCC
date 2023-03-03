<?php
session_start();
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
   <body>
      
   <?php include 'Navbar.php'; 

      $id = $_GET['id'];
      
      
      ?>
      <div class="container ">

      <?php
        require_once 'conexao.php';
        $sql = "SELECT * FROM produtos where id = $id";
        $dados = $conn->query($sql) or die("Erro ao executar comando: " . mysqli_error($conn));
        while ($produto = $dados->fetch_assoc()) {
      ?>
       
         <div class="containerbk">
         <div class="row">
           <div class="col-sm">
           <div class="tshirt_img_product"><img src="../images/<?php echo $produto['imagem'] ?>" alt="Imagem do produto"></div>
           </div>
           <div class="col-sm-7 pt-5">
           <h1 class="fashion_product"><?php echo $produto['nome'];?></h1>
           <hr>
           <br>
           <a class="price_text">R$<?php echo number_format($produto['preco'], 2, ',', '.'); ?></a>
           <br>
           <br>
         <hr>
      
         <div class="accordion" id="accordionExample">
            <div class="card">
              <div class="card-header" id="headingThree">
                <h5 class="mb-0">
                  <button class="btn btn-light collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree" style="width: 80%;">
                  informações do Produto
                  </button>
                </h5>
              </div>
              <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                <div class="card-body">
                  <a>97% de origem natural</a>
                  <br>
                  <a>Produto vegano</a>
                  <br>
                  <a>Contém ativo da biodiversidade brasileira</a>
                  <br>
                  <a>Biodegradável </a>               </div>
              </div>
            </div>
            <br><br>
            <a href="carrinho.php?acao=add&id=<?php echo $produto['id'] ?>" class="btn btn btn-secondary">Adicionar ao Carrinho!</a>
            <hr>
            
         </div>
         </div>

         
         </div>
   </div>
   <?php
      }
   ?>
</div>
<br><br><br>


<?php include 'Footer.php'; ?>



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
        </script>
</body>
</html>