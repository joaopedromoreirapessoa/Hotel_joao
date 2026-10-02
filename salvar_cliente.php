<?php

require_once "conexao.php";

$nome = mysqli_real_escape_string($conexao, $_POST["nome"]);
$email = mysqli_real_escape_string($conexao, $_POST["email"]);
$telefone = mysqli_real_escape_string($conexao, $_POST["telefone"] ?? "");
$senha = mysqli_real_escape_string($conexao, $_POST["senha"]);

$sql = "INSERT INTO clientes (nome, email, telefone, senha)
        VALUES ('$nome', '$email', '$telefone', '$senha')";

if (mysqli_query($conexao, $sql)) {
    echo "<h2>Cliente cadastrado com sucesso!</h2>";
    echo '<a href="login.html">Ir para o login</a>';
} else {
    echo "Erro ao cadastrar cliente: " . mysqli_error($conexao);
}

?>