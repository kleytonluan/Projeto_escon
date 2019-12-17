<?php
    // Criando nossas variáveis para guardar as informações do formulário
$dest= "previsaoescalas@gmail.com";
$solicitante=$_POST['solicitante'];
$voluntario=$_POST['voluntario'];
$servico=$_POST['servico'];
$dataservico=$_POST['dataservico'];
$justificativa=$_POST['justificativa'];
$email=$_POST['email'];

    echo(

        $dest . "<br />" .
        $solicitante . "<br />" .
        $voluntario . "<br />" .
        $servico . "<br />" .
        $dataservico . "<br />" .
        $justificativa . "<br />" .
        $email . "<br />" .




    );
 //   $headers = "MIME-Version 1.1\n";
//    $headers .= "From: Contato - Size <" . $dest . "> \r\n" ."x-Mailer: PHP/" . phpversion() . "\r\n";
  //  $headers .= "Content-type: text/html; charset=utf-8\n";
  //  $headers .= "Return-Path: " . $solicitante . " <" . $email . ">\n";
 //   $headers .= "Cc: Contato - Escalas <sgtkleyton@3bec.eb.mil.br\n";
 //   $headers .= "Replay-To: " . $email . "\n";
 //   $to = "Solicitação de troca de serviço <" . $dest . ">";
 //   $subject = "Solicitação de troca de serviço";

 //   $conteudo .= "
    
 //       <h3>Solicitação de troca de serviço<3>
  //      Militar solicitante: '.$solicitante.'<br />'
 //       Militar voluntário: '.$voluntario.'<br />'
  //      Serviço: '.$servico.'<br />'
//        Dia do serviço: '.$dataservico.'<br />'
  //      Justificativa: '.$justificativa.'<br />'
  //      Responder para: '.$email . "



 //   $envio = mail($to, $subject, $conteudo, $headers);

 //   if($envio) {
 //       ?>
//           <script>
  //              alert("Solicitação enviada com sucesso!");
  //              history.go(-1);
  //          </script>
  //      <?php
  //  } else {
 //       ?>
//            <script>
  //              alert("Solicitação não foi enviada. :(");
 //               history.go(-1);
  //          </script>
  //      <?php
  //  }

?>
