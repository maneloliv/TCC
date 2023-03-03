<?php
include("conexao.php");
if (isset($_POST["txtNome"])) {
$nome = $_POST["txtNome"];
$preco = $_POST["txtPreco"];
if (empty($nome)) {
echo "Preencha as informações corretamente.";
exit;
} else {
$SQL = "UPDATE produtos SET nome= '".$nome."', preco= '".$preco."' WHERE id = ".$_GET["id"];
if ($conn->query($SQL) === TRUE) {
echo "<script>alert('Registro atualizado com sucesso.');</script>";
echo "<script>window.location = 'index.php';</script>";
} else {
echo "<script>alert('Erro ao editar o registro.');</script>";
echo "<script>window.location = 'index.php';</script>";
}
}
}
?>
<!DOCTYPE html>
<html>
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
<title>𝙽𝙰𝚃𝙺𝙾𝚂 ➜ 𝙰𝚃𝚄𝙰𝙻𝙸𝚉𝙰𝚁 𝙿𝚁𝙾𝙳𝚄𝚃𝙾𝚂</title>
</head>
<body style="background-color:#E3E6E6">
<?php
if (isset($_GET["id"])) {
if (is_numeric($_GET["id"])) { 
$SQL = "SELECT * FROM Produtos WHERE id = " . $_GET["id"];
$executa = $conn->query($SQL);
$resultado = $executa->fetch_assoc();
?>
<fieldset>
<div class="container p-5" style="background-color:white; margin-top: 150px;">
<legend>Atualizar Produto</legend>
<form name="frm_Pessoa" method="POST"
action="atualizarProd.php?id=<?php echo $_GET["id"];?>">
 Nome:<input type="text" name="txtNome" required="required" class="form-control"
value="<?php echo $resultado["nome"]; ?>"/>
<br>
 Preço:<input type="number" name="txtPreco" class="form-control"
required="required" value="<?php echo $resultado["preco"]; ?>"/>
<br/>
<input type="submit" class="btn btn-secondary" value="Atualizar">
<a href="ExibirProd.php"><input type="button" class="btn btn-danger" name="btnCancelar" value="Voltar"></a>
</form>
</div>
</fieldset>
<?php
}
}
?>
</body>
</html>