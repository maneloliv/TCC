<?php

require_once("configLk.php");
session_start();

$email = $conn->real_escape_string($_POST["email"]);
$senha = md5($_POST["senha"]);

$sql = "SELECT * FROM usuarios WHERE email = '$email' and senha = '$senha'";

$result = $conn->query($sql);

if($result->num_rows > 0){
    $dadosusuario = $result->fetch_assoc();
    $_SESSION["email"] = $dadosusuario["email"];
    $_SESSION["senha"] = $dadosusuario["senha"];
    $_SESSION["nomeUsuario"] = $dadosusuario["nome"];
    header("location: index.php");
}else{
    ?>
    <script>
    alert("Email ou Senha incorretos.");
    window.history.back();
    </script>
    <?php
}



?>