<?php

require_once "conexao.php";

$nome = mysqli_real_escape_string($conexao, $_POST["nome"]);
$cidade = mysqli_real_escape_string($conexao, $_POST["cidade"]);
$email = mysqli_real_escape_string($conexao, $_POST["email"]);
$senha = mysqli_real_escape_string($conexao, $_POST["senha"]);
$estrelas = (int) $_POST["estrelas"];

$sql = "INSERT INTO hoteis (nome, cidade, estrelas, email, senha)
        VALUES ('$nome', '$cidade', $estrelas, '$email', '$senha')";

if (mysqli_query($conexao, $sql)) {
    echo "<h2>Hotel cadastrado com sucesso!</h2>";
    echo '<a href="login_hotel.html">Ir para o login do hotel</a>';
} else {
    echo "Erro ao cadastrar hotel: " . mysqli_error($conexao);
}

?>