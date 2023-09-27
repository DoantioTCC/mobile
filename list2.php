<?php


include 'db/conexao.php';
session_start();

    $sql = "select imagem,tipo,descricao,id from doacao where requisicao = '0' and concluido = '0'";
    $query = mysqli_query($conexao, $sql);
    while($registro = mysqli_fetch_assoc($query))
        {
    $dados[] = $registro;
        }
        echo json_encode($dados);