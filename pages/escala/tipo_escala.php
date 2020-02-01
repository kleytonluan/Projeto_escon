<?php
session_start();
include_once("../../conexao.php");


    $tipo_servico = $_REQUEST['tipo_servico'];

    $pesquisa = "SELECT 
                    militar.idmilitar, 
                    militar.nome_completo, 
                    militar.folga, 
                    militar.nome_guerra, 
                    militar.data_praca, 
                    militar.situacao_idsituacao1, 
                    militar.posto_grad_idposto_grad,
                    posto_grad.desc_posto_grad, 
                    situacao.desc_situacao, 
                    companhia.desc_companhia 
                FROM 
                    militar, 
                    tipo_servico, 
                    situacao, 
                    companhia, 
                    tipo_servico_has_militar, 
                    posto_grad 
                WHERE 
                    idsituacao = situacao_idsituacao1 
                AND 
                    tipo_servico_idtipo_servico = idtipo_servico 
                AND 
                    militar_idmilitar = idmilitar 
                AND 
                    idcompanhia = companhia_idcompanhia 
                AND 
                    posto_grad_idposto_grad = idposto_grad 
                AND 
                    desc_situacao = ('pronto') 
                AND 
                    idtipo_servico = $tipo_servico;";

            
    $resultado = mysqli_query($conexao,$pesquisa);
                          
    while ($linha = mysqli_fetch_assoc($resultado)) { 

        $resultado_post[] = array(
           
            'idmilitar' => $linha['idmilitar'],
            'posto_grad' => utf8_encode($linha['desc_posto_grad']),
            'nome_guerra' => $linha['nome_guerra'],
            'data_praca' => $linha['data_praca'],
            'desc_companhia' => utf8_encode($linha['desc_companhia']),
            'desc_situacao' => utf8_encode($linha['desc_situacao']),
            'folga' => $linha['folga'],

        );
}

echo (json_encode($resultado_post));

?>