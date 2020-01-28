<?php 

session_start();

include('conexao.php');

if (empty($_POST['login']) || empty($_POST['senha'])) {
  header('Location: index.html');
  exit();
}

$login = mysqli_real_escape_string($conexao, $_POST['login']);
$senha = mysqli_real_escape_string($conexao, $_POST['senha']);

$consulta = "SELECT login, senha FROM admin where login = '$login' and senha = '$senha'";

$result = mysqli_query($conexao, $consulta);

$row = mysqli_num_rows($result);

if ($row == 1){
  $_SESSION['login'] = $login;
  header('Location: inicio.php');
  exit();
}else{
  header('Location: index.html');
}