<?php
session_start();
include_once("../../conexao.php");

$nome_completo = mysqli_real_escape_string($conexao, $_POST['nome_completo']);
$nome_guerra =  mysqli_real_escape_string($conexao, $_POST['nome_guerra']);
$posto_grad =  mysqli_real_escape_string($conexao, $_POST['posto_grad']);
$data_praca =  mysqli_real_escape_string($conexao, $_POST['data_praca']);
$companhia =  mysqli_real_escape_string($conexao, $_POST['companhia']);
$situacao =  mysqli_real_escape_string($conexao, $_POST['situacao']);


$sql = "select count(*) as total from militar where nome_completo = '$nome_completo'";
$result = mysqli_query($conexao, $sql);

$row = mysqli_fetch_assoc($result);

if($row['total'] == 1) {
  $_SESSION['usuario_existe'] = true;
  echo "
  <script language='javascript' type='text/javascript'>
        alert('Militar já existe da base de dados!');
        window.location.href='cadastro-militar.php';
    </script>";
    header('Location: cadastro-militar.php');
    exit;
}


$insert = "INSERT INTO militar (nome_completo, nome_guerra, posto_grad, data_praca, companhia, situacao) VALUES ('$nome_completo', '$nome_guerra', '$posto_grad', '$data_praca', '$companhia', '$situacao')";

if($conexao->query($insert) === TRUE) {
    $_SESSION['status_cadastro'] = true;
    echo"
    <script language='javascript' type='text/javascript'>
        alert('Cadastro realizado com sucesso');window.location
        .href='consulta-militar.php';
    </script>
  ";
}

$conexao->close();

header('Location: consulta-militar.php');
exit;

?>
