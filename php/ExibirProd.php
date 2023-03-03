<html>
<head>
<meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <link rel="icon" type="image/png" href="../images/logo.png"/>
      <title>𝙽𝙰𝚃𝙺𝙾𝚂 ➜ 𝙻𝙸𝚂𝚃𝙰 𝙳𝙴 𝙿𝚁𝙾𝙳𝚄𝚃𝙾𝚂</title>
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
      <link rel="stylesheet" href="foda.css">
<title>Exemplo PHP</title>
<script type="text/javascript">
function apagar(id, nm, sn) {
if (window.confirm("Deseja realmente apagar este registro:\n" + nm + " " +
sn)) {
window.location = 'deletarprod.php?id=' + id;
}
}
</script>
</head>
<body>
<?php
session_start();
if ($_SESSION["nomeUsuario"] == "admin") {

      ?>
<fieldset>
<div style="text-align: center; margin: 20px; ">
<legend>Lista de Produtos da Loja</legend>
</div>
<?php
include 'conexao.php';
$sql = "SELECT * FROM produtos";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
?>
<table class="table table-hover" style="background-color:#fff">
<thead class="thead-dark">
<tr> <th>Código</th><th>Nome</th> <th>Preco</th>
<th></th><th></th></tr>
<?php
while ($exibir = $result->fetch_assoc()){
?>
<tr>
</thead>
<td><?php echo $exibir["id"] ?> </td>
<td><?php echo $exibir["nome"] ?> </td>
<td>R$<?php echo $exibir["preco"] ?> </td>
<td><a style="background-color:#f2f2f2;; padding: 8px" href="atualizarProd.php?id=<?php echo
$exibir["id"] ?>">Editar</a></td>
<td><a class="redh" style="background-color:#f2f2f2;; padding: 8px;" href="#" onclick="apagar('<?php echo
$exibir["id"] ?>', '<?php echo $exibir["nome"] ?>','<?php echo
$exibir["preco"] ?>');">
Excluir</a></td>
</tr>
<?php
}
?>
</table>
<?php
}
else {
echo "Nenhum registro encontrado.";
}
$conn->close();
?>
<a class="btn btn-outline-dark" href="index.php">Voltar para Produtos</a>
</fieldset>
<?php
} else {
      ?>     
      <?php
      header('Location: protect.php');
}
?>
</body>
</html>