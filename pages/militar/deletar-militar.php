<?php

session_start();
include_once("../../conexao.php");


$id = intval($_GET['id']);
#$id = filter_input(INPUT_GET,'id', FILTER_SENITIZE_NUMBER_INT);

$comando = "DELETE FROM militar where idmilitar = '$id'";

$resultado = mysqli_query ($conexao, $comando); 

if(mysqli_affected_rows($conexao)){
    $_SESSION ['msg'] = true;
    echo"
    <script language='javascript' type='text/javascript'>
        alert('Militar excluido com sucesso!');
        window.location.href='consulta-militar.php';
    </script>"
    ;
  die();
  header('Location: consulta-militar.php');
} else {
    echo"
    <script language='javascript' type='text/javascript'>
        alert('Erro ao excluir o militar.');
        window.location.href='consulta-militar.php';
    </script>"
    ;
  die();
  header('Location: consulta-militar.php');
}

/*
$id = intval($_GET['id']);


$sql_query = $mysqli->query($comando) or die ($mysqli->error);

if($sql_query)
    echo "
    <script>
        alert('Militar deletado com sucesso.');
        Location.href='consulta-militar.php?'
    </script>";
else
    echo "
    <script>
        alert('Não foi possível deletar o militar.');
        Location.href='consulta-militar.php?'
    </script>";



function deletar($tabela, $where=NULL) {

    $comando = "DELETE FROM {$tabela} where {$where}";

    if($conexao = connect()){
        if(mysql_query($comando, $conexao)){
            fechaConexao($conexao);
            return true;
        }else{
            echo "Comando invalido ($comando)";
            return false;
        }
    }else{
        return false;
    }

} */

?>


