<?php

$servidor = "localhost";
$usuario = "root";
$senha = "senha";
$dbname = "banco";

$conexao = mysqli_connect ($servidor, $usuario, $senha, $dbname) or die ("Não foi possivel conectar!");

?>
