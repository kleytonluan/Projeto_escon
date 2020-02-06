<?php

include("../../conexao.php");

session_start();

$data = mysqli_real_escape_string($conexao, $_POST['data']);
$tipo_escala = mysqli_real_escape_string($conexao, $_POST['tipo_escala']);
$tipo_servico = mysqli_real_escape_string($conexao, $_POST['tipo_servico']);
$militar = mysqli_real_escape_string($conexao, $_POST['idmilitar']);

/*

echo ($data);
echo ($tipo_escala);
echo ($tipo_servico);
echo ($militar);
*/

$cadastro = "INSERT into escala (data_escala, tipo_escala, militar_idmilitar, tipo_servico_idtipo_servico) 
                values 
                    ('$data',
                    '$tipo_escala',
                     $militar,
                     $tipo_servico);";
//echo ($cadastro);

$alterar_militar = "UPDATE 
                        militar 
                    SET 
                        situacao_idsituacao1=2,
                        folga_preta = 0
                    WHERE
                        idmilitar = $militar;";


if($conexao->query($cadastro) === TRUE) {
    $_SESSION['status_escala'] = true;

        $alteracao = mysqli_query ($conexao, $alterar_militar);

        if(mysqli_affected_rows($conexao)){
            $_SESSION ['alteracao_realizada'] = true;
          echo"
            <script language='javascript' type='text/javascript'>
                alert('Escala gerada com sucesso. Situação do militar foi alterada!');
                window.location.href='consulta-escala.php';
            </script>"
            ;
          die();
          header('Location: consulta-escala.php');
        }else{
            echo"
              <script language='javascript' type='text/javascript'>
                  alert('Erro ao alterar a situação do militar!');
                  window.location.href='cadastro-escala.php';
              </script>"
              ;
            die();
            header('Location: cadastro-escala.php');
          }

    }else{
    echo"
        <script language='javascript' type='text/javascript'>
            alert('Erro ao gerar a escala');window.location
            .href='cadastro-escala.php';
        </script>
    ";
    die();
    header('Location: cadastro-escala.php');
    exit;
    }







?>