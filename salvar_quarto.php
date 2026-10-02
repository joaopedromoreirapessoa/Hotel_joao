<?php

session_start();
require_once "conexao.php";

$hotel_id = (int) $_POST["hotel_id"];
$numero = mysqli_real_escape_string($conexao, $_POST["numero"]);
$tipo = mysqli_real_escape_string($conexao, $_POST["tipo"]);
$preco_diaria = (float) $_POST["preco_diaria"];

$sql = "INSERT INTO quartos (hotel_id, numero, tipo, preco_diaria)
        VALUES ($hotel_id, '$numero', '$tipo', $preco_diaria)";

if (mysqli_query($conexao, $sql)) {
    echo "<h2>Quarto cadastrado com sucesso!</h2>";
    echo '<a href="cadastrar_quarto.html">Cadastrar outro quarto</a><br><br>';
    echo '<a href="listar_quartos.php">Ver quartos cadastrados</a><br><br>';
    echo '<a href="logout_hotel.php">Sair do sistema</a>';
} else {
    echo "Erro ao cadastrar quarto: " . mysqli_error($conexao);
}

?>