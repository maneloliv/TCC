<?php
include 'conexao.php';
$nome = $_POST["txtNome"];
$preco = $_POST["txtPreco"];
$msg = false;

    if(isset($_FILES['arquivo'])){

        $extensao = strrchr($_FILES['arquivo']['name'], '.');
        $novo_nome = md5(time()) . $extensao;
        $diretorio = "../images/";

        move_uploaded_file($_FILES['arquivo']['tmp_name'], $diretorio.$novo_nome);
        

$sql = "INSERT INTO produtos (nome, preco, imagem) VALUES ('$nome', $preco, '$novo_nome')";
echo $sql;

if ($conn->query($sql) === TRUE) {
echo "<script>alert('Produto inserido com sucesso.');</script>";
echo "<script>window.location = 'index.php';</script>";
} else {
echo "Erro: " . $sql . "<br>" . $conn->error;
echo "<script>window.history.back();</script>";
}
    }
$conn->close();
?>