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
  $_SESSION['nao_autenticado'] = true;
  echo"
        <script language='javascript' type='text/javascript'>
            alert('Login e/ou senha incorretos');window.location
            .href='index.html';
        </script>
      ";
        die();
  header('Location: index.html');
  exit();
}