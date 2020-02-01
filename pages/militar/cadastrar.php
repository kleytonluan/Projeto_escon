<?php
session_start();
include_once("../../conexao.php");

$nome_completo = mysqli_real_escape_string($conexao, $_POST['nome_completo']);
$nome_guerra =  mysqli_real_escape_string($conexao, $_POST['nome_guerra']);
$data_praca =  mysqli_real_escape_string($conexao, $_POST['data_praca']);
$posto_grad =  mysqli_real_escape_string($conexao, $_POST['posto_grad']);
$companhia =  mysqli_real_escape_string($conexao, $_POST['companhia']);
$situacao =  mysqli_real_escape_string($conexao, $_POST['situacao']);
$folga =  mysqli_real_escape_string($conexao, $_POST['folga']);


/*$nome_completo = filter_input(INPUT_POST,'nome_completo', FILTER_SENITIZE_STRING);
$nome_guerra =  filter_input(INPUT_POST,'nome_guerra', FILTER_SENITIZE_NUMBER_INT);
$posto_grad = filter_input(INPUT_POST,'posto_grad', FILTER_SENITIZE_NUMBER_INT);
$data_praca = filter_input(INPUT_POST,'data_praca', FILTER_SENITIZE_STRING);
$companhia = filter_input(INPUT_POST,'companhia', FILTER_SENITIZE_STRING);
$folga =  filter_input(INPUT_POST,'folga', FILTER_SENITIZE_NUMBER_INT);
$situacao = filter_input(INPUT_POST,'situacao', FILTER_SENITIZE_NUMBER_INT);

*/

$sql = "select count(*) as total from militar where nome_completo = '$nome_completo'";

$result = mysqli_query($conexao, $sql);

$row = mysqli_fetch_assoc($result);

if($row['total'] == 1) {
  $_SESSION['usuario_existe'] = true;
  echo"
  <script language='javascript' type='text/javascript'>
        alert('Militar já existe da base de dados!');
        window.location.href='cadastro-militar.php';
    </script>"
    ;
  die();
  header('Location: cadastro-militar.php');
  exit;
}

$insert = "INSERT INTO militar (nome_completo, nome_guerra, data_praca, posto_grad_idposto_grad, companhia_idcompanhia, situacao_idsituacao1, folga) VALUES ('$nome_completo','$nome_guerra','$data_praca', $posto_grad,$companhia,$situacao,$folga)";


if($conexao->query($insert) === TRUE) {
    $_SESSION['status_cadastro'] = true;
    header('Location: consulta-militar.php');
    exit;

}else{
  echo"
    <script language='javascript' type='text/javascript'>
        alert('Erro ao cadastrar militar');window.location
        .href='cadastro-militar.php';
    </script>
  ";
  die();
  header('Location: cadastro-militar.php');
  exit;
}

$conexao->close();

//header('Location: consulta-militar.php');
//exit;

?>
