<?php
require_once "conexao.php";

$email = $_POST['email'];
$senha = $_POST['senha'];

$sql = "SELECT * FROM hoteis WHERE email = '$email' and senha = '$senha'";


$resultado = mysqli_query($conexao, $sql);

if(mysqli_num_rows($resultado) > 0){
   header("Location:cadastrar_quarto.html");
   exit();
}else{
   header("Location:login.html");
exit();
}
?>
a