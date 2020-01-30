<?php
session_start();
include_once("../../conexao.php");



$id = intval($_GET['id']);
#$id = filter_input(INPUT_GET,'id', FILTER_SENITIZE_NUMBER_INT);
/*$nome_completo = filter_input(INPUT_POST,'nome_completo', FILTER_SENITIZE_STRING);
$nome_guerra =  filter_input(INPUT_POST,'nome_guerra', FILTER_SENITIZE_NUMBER_INT);
$posto_grad =  filter_input(INPUT_POST,'posto_grad', FILTER_SENITIZE_STRING);
$data_praca = filter_input(INPUT_POST,'data_praca', FILTER_SENITIZE_STRING);
$companhia = filter_input(INPUT_POST,'companhia', FILTER_SENITIZE_STRING);
$situacao =  filter_input(INPUT_POST,'situacao', FILTER_SENITIZE_STRING);
*/

$id = mysqli_real_escape_string($conexao, $_POST['idmilitar']);
$nome_completo = mysqli_real_escape_string($conexao, $_POST['nome_completo']);
$nome_guerra =  mysqli_real_escape_string($conexao, $_POST['nome_guerra']);
$posto_grad =  mysqli_real_escape_string($conexao, $_POST['posto_grad']);
$data_praca =  mysqli_real_escape_string($conexao, $_POST['data_praca']);
$companhia =  mysqli_real_escape_string($conexao, $_POST['companhia']);
$situacao =  mysqli_real_escape_string($conexao, $_POST['situacao']);

$comando = "UPDATE militar SET 
                    nome_completo ='$nome_completo', 
                    nome_guerra='$nome_guerra', 
                    posto_grad='$posto_grad', 
                    data_praca='$data_praca', 
                    companhia='$companhia', 
                    situacao='$situacao' 
              WHERE 
                    idmilitar = '$id'";

$resultado = mysqli_query ($conexao, $comando); 

if(mysqli_affected_rows($conexao)){
    $_SESSION ['msg'] = "
    <script>
        alert('Militar editado com sucesso.');
    </script>";
    header ("Location: consulta-militar.php");
}else{
  $_SESSION ['msg'] = "
    <script>
        alert('Militar não editado.');
    </script>";
    header ("Location: editar-militar.php");
}


/*
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

if($conexao->query($cadastro) === TRUE) {
	$_SESSION['status_cadastro'] = true;
}

$conexao->close();

header('Location: cadastro-militar.php');
exit;
?>*/

?>

