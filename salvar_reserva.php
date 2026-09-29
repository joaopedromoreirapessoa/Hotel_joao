<?php
require_once 'conexao.php';
$id = $_POST['id'];
$id_cliente = $_POST['cliente_id'];
$id_quarto = $_POST['quarto_id'];
$data_entrada = $_POST['data_entrada'];
$data_saida = $_POST['data_saida'];
$total = $_POST['total'];

$sql = "INSERT_INTO reservas (id, clientes_id, quarto_id, data_entrada, data_saida, total) VALUES ('$id','$id_clientes', '$id_quartos', '$data_entradas', '$data_saida', 100)";
 if(mysqli_query($conexao, $sql)){
    echo "Reserva salva com sucesso!";
    }else{
        echo "Não foi possivel salvar sua reserva.";
        echo "<a href ='ver_quartos.php'> Tente novamente, Fez cagada...</a>";
    
 }



?>