<?php

session_start();
require_once "conexao.php";

$email = mysqli_real_escape_string($conexao, $_POST["email"]);
$senha = mysqli_real_escape_string($conexao, $_POST["senha"]);

$sql = "SELECT * FROM clientes
        WHERE email = '$email' AND senha = '$senha'";

$resultado = mysqli_query($conexao, $sql);

if (mysqli_num_rows($resultado) > 0) {
    $cliente = mysqli_fetch_assoc($resultado);

    $_SESSION["cliente_id"] = $cliente["id"];
    $_SESSION["cliente_nome"] = $cliente["nome"];

    header("Location: minhas_reservas.php");
    exit;
} else {
    echo "<h2>E-mail ou senha incorretos.</h2>";
    echo '<a href="login.html">Tentar novamente</a>';
}

?>