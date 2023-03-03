<?php
include ("conexao.php");
if(is_numeric($_GET["id"])){
$SQL = "DELETE FROM produtos WHERE id = ".$_GET["id"];
if ($conn->query($SQL) === TRUE) {
echo "<script>alert('Produto excluído com sucesso!');</script>";
echo "<script>window.location = 'ExibirProd.php';</script>";
}
else{
echo "<script>alert('Erro ao excluir o produto!');</script>";
echo "<script>window.location = 'ExibirProd.php';</script>";
}
}
?>