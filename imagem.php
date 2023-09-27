<?php


include 'db/conexao.php';
session_start();


$email  = $_POST['email'];
$imagem = $_POST['imagem'];

if ($email=="")
{
    echo "deslogado";
}

$sqls1 = "select email from pessoaf where email = '$email'";
$sqls2 = "select email from pessoaj where email = '$email'";

$consultars     = mysqli_query($conexao,$sqls1);
$consultars2    = mysqli_query($conexao,$sqls2);
$valido         = mysqli_num_rows($consultars);
$valido2        = mysqli_num_rows($consultars2);

if ($valido>0)
{
    $sql = "update pessoaf set imagem = '" . $imagem ."' where email = '" . $email . "'";
    $consultar = mysqli_query($conexao,$sql);
    echo $imagem; //imagem alterada com sucesso
}
else if ($valido2>0)    //imagem
{
    $sqlj = "update pessoaj set imagem = '" . $imagem ."' where email = '" . $email . "'";
    $consultar2 = mysqli_query($conexao,$sqlj);
    echo $imagem; //imagem alterada com sucesso
}