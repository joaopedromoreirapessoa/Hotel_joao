<?php

include 'conexao.php';

$email = $_POST['email'];
$senha = $_POST['senha'];

$sql = "SELECT * FROM clientes WHERE senha = '$senha' AND email = '$email'";

$resultado = mysqli_query(
    $conexao,
    $sql
);

if(mysqli_num_rows($resultado) > 0){
    echo "Login realizado com sucesso!";
}else{
    echo "Email ou senha inválidos! Tente novamente!\n";
    echo "<a href='login.html'>VOLTAR</a>";
}

?> 