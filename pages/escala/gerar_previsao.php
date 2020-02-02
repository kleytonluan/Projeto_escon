<?php

include("../../conexao.php");

session_start();


$data_inicio = mysqli_real_escape_string($conexao, $_POST['data_inicio']);
$data_fim = mysqli_real_escape_string($conexao, $_POST['data_fim']);

 
// Definimos o intervalo de 1 ano
$intervalo = new DateInterval('P1D');
 
// Resgatamos datas de cada ano entre data de início e fim
$periodo = new DatePeriod($data_inicio, $intervalo, $data_fim);
 
foreach($periodo as $date) {
    echo $date->format("d/m/Y") . '<br />' . PHP_EOL;
}
/**
 * Resultado:
 * 11/10/1988
 * 11/10/1989
 * 11/10/1990
 * 11/10/1991
 * 11/10/1992
 * 11/10/1993
 */
?>