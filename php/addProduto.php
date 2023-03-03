<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
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
      <link rel="icon" type="image/png" href="../images/logo.png"/>
<title>𝙽𝙰𝚃𝙺𝙾𝚂 ➜ 𝙰𝙳𝙸𝙲𝙸𝙾𝙽𝙰𝚁 𝙿𝚁𝙾𝙳𝚄𝚃𝙾𝚂</title>
</head>
<body style="background-color:#E3E6E6">
<?php
session_start();
if ($_SESSION["nomeUsuario"] == "admin") {

      ?>
<fieldset>
<div class="container p-4" style="background-color:white; margin-top: 150px;">
<legend>Inserir novo Produto</legend>
<form action="insertProduto.php" method="post" enctype="multipart/form-data">
<label for="txtNome">Nome: </label>
<input type="text" name="txtNome" class="form-control" required autofocus placeholder="Informe o nome do Produto">
<br><br>
<label for="txtPreco">Preço: </label>
<input class="form-control" type="number" name="txtPreco"
placeholder="Informe o preço">
<small class="form-text text-muted">Apenas Numeros</small>
<br><br>
<label for="">Imagem</label>
<input type="file" riquired name="arquivo">
<br><br><br>
<input type="submit" class="btn btn-secondary" value="Adicionar">
<a href="index.php"><input type="button" class="btn btn-danger" name="btnCancelar" value="Cancelar"></a>
</form>
</div>
</fieldset>
<?php
} else {
      ?>
      <?php
      header('Location: protect.php');
}
?>
</body>
