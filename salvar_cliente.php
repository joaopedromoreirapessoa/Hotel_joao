<?php

require_once 'conexao.php';

$nome = $_POST['nome'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$senha = $_POST['senha'];

$sql = "INSERT INTO clientes (nome, email, telefone, senha)
VALUES ('$nome', '$email', '$telefone', '$senha')";

if(mysqli_query($conexao,$sql)){
    echo "<br>Cadastro realizado com sucesso!";
}else{
    echo "<br>Error 404";
}

?>