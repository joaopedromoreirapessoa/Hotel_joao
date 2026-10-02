<?php

require_once "conexao.php";

$id_cliente = (int) $_POST["id_cliente"];
$id_quarto = (int) $_POST["id_quarto"];
$data_entrada = mysqli_real_escape_string($conexao, $_POST["data_entrada"]);
$data_saida = mysqli_real_escape_string($conexao, $_POST["data_saida"]);

if ($data_saida <= $data_entrada) {
    echo "<h2>A data de saída deve ser posterior à data de entrada.</h2>";
    echo '<a href="javascript:history.back()">Voltar</a>';
    exit;
}

$sql_quarto = "SELECT preco_diaria FROM quartos
               WHERE id = $id_quarto AND disponivel = 1";

$resultado_quarto = mysqli_query($conexao, $sql_quarto);

if (mysqli_num_rows($resultado_quarto) == 0) {
    echo "<h2>Quarto não encontrado ou indisponível.</h2>";
    echo '<a href="listar_hoteis.php">Voltar para hotéis</a>';
    exit;
}

$quarto = mysqli_fetch_assoc($resultado_quarto);
$preco_diaria = (float) $quarto["preco_diaria"];

$data1 = new DateTime($data_entrada);
$data2 = new DateTime($data_saida);
$diarias = $data1->diff($data2)->days;

$total = $preco_diaria * $diarias;

$sql = "INSERT INTO reservas
        (cliente_id, quarto_id, data_entrada, data_saida, total)
        VALUES
        ($id_cliente, $id_quarto, '$data_entrada', '$data_saida', $total)";

if (mysqli_query($conexao, $sql)) {
    echo "<h2>Reserva realizada com sucesso!</h2>";
    echo "<p>Total da reserva: R$ " . number_format($total, 2, ",", ".") . "</p>";
    echo '<a href="minhas_reservas.php">Ver Minhas Reservas</a>';
} else {
    echo "Erro ao salvar reserva: " . mysqli_error($conexao);
    echo '<br><br><a href="listar_hoteis.php">Voltar</a>';
}

?>