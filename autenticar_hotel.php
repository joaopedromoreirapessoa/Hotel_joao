<?php

session_start();
require_once "conexao.php";

$email = mysqli_real_escape_string($conexao, $_POST["email"]);
$senha = mysqli_real_escape_string($conexao, $_POST["senha"]);

$sql = "SELECT * FROM hoteis
        WHERE email = '$email' AND senha = '$senha'";

$resultado = mysqli_query($conexao, $sql);

if (mysqli_num_rows($resultado) > 0) {
    $hotel = mysqli_fetch_assoc($resultado);

    $_SESSION["hotel_id"] = $hotel["id"];
    $_SESSION["hotel_nome"] = $hotel["nome"];

    header("Location: cadastrar_quarto.html");
    exit;
} else {
    echo "<h2>E-mail ou senha do hotel incorretos.</h2>";
    echo '<a href="login_hotel.html">Tentar novamente</a>';
}

?>