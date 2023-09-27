<?php


include 'db/conexao.php';
session_start();

// $id = $_POST['id'];
$id = 11;

$sqlv1 = "select cpfdoador from doacao where id = '$id'";
$sqlv2 = "select cnpjdoador from doacao where id = '$id'";

$consultarv1 = mysqli_query($conexao,$sqlv1);
$consultarv2 = mysqli_query($conexao,$sqlv2);
$valido = mysqli_num_rows($consultarv1);
$valido2 = mysqli_num_rows($consultarv2);

if ($valido>0 && mysqli_fetch_assoc($consultarv1)!=0){     // pessoa fisica
    $sqlgeral = "select 
    doacao.imagem,doacao.descricao,doacao.tipo,doacao.usado,doacao.concluido,doacao.cpfdoador, pessoaf.cpf, pessoaf.nome from doacao
    inner join pessoaf on doacao.cpfdoador = pessoaf.cpf where id = '$id'";
    $querygeral = mysqli_query($conexao,$sqlgeral);
     $registro = mysqli_fetch_assoc($querygeral);
    $dados[] = $registro;
if(count($dados)>0)
{
echo json_encode($dados);
}
}
else if ($valido2>0 && mysqli_fetch_assoc($consultarv2)!=0){       //pessoa juridica

}
else {      // id não encontrado
    echo "erro";
}
