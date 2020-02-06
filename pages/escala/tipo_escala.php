<?php
session_start();
include_once("../../conexao.php");


    $tipo_servico = $_REQUEST['tipo_servico'];

    $pesquisa = "SELECT 
                    militar.idmilitar, 
                    militar.nome_completo, 
                    militar.folga_preta,
                    militar.folga_vermelha,  
                    militar.nome_guerra, 
                    militar.data_praca, 
                    militar.situacao_idsituacao1, 
                    militar.posto_grad_idposto_grad,
                    posto_grad.desc_posto_grad, 
                    situacao.desc_situacao
                FROM 
                    militar, 
                    situacao, 
                    posto_grad,
                    tipo_servico
                WHERE 
                    idsituacao = situacao_idsituacao1 
                AND 
                    idtipo_servico = tipo_servico_idtipo_servico1
                AND
                    posto_grad_idposto_grad = idposto_grad 
                AND 
                    desc_situacao = ('pronto') 
                AND 
                    idtipo_servico = $tipo_servico 
                ORDER BY 
                    folga_preta desc;";

            
    $resultado = mysqli_query($conexao,$pesquisa);
                          
    while ($linha = mysqli_fetch_assoc($resultado)) { 

        $resultado_post[] = array(
           
            'idmilitar' => $linha['idmilitar'],
            'posto_grad' => utf8_encode($linha['desc_posto_grad']),
            'nome_guerra' => $linha['nome_guerra'],
            'data_praca' => $linha['data_praca'],
            'desc_companhia' => utf8_encode($linha['desc_companhia']),
            'desc_situacao' => utf8_encode($linha['desc_situacao']),
            'folga_preta' => $linha['folga_preta'],
            'folga_vermelha' => $linha['folga_vermelha'],


        );
}

echo (json_encode($resultado_post));

?>