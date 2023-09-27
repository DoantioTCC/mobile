<?php


include 'db/conexao.php';
session_start();


$email  = $_POST['email'];
$nsenha = $_POST['nsenha']; // Nova senha
$nnome  = $_POST["nnome"]; // novo nome
$funcao = $_POST["funcao"];

if ($funcao == 1) //senha
{
    $hash = password_hash($nsenha,PASSWORD_DEFAULT);

    
    $sqls1 = "select email from pessoaf where email = '$email'";
    $sqls2 = "select email from pessoaj where email = '$email'";
    
    $consultars     = mysqli_query($conexao,$sqls1);
    $consultars2    = mysqli_query($conexao,$sqls2);
    $valido         = mysqli_num_rows($consultars);
    $valido2        = mysqli_num_rows($consultars2);
    
     if ($valido>0)
     {
        $sql = "update pessoaf set senha = '" . $hash ."' where email = '" . $email . "'";
        $consultar = mysqli_query($conexao,$sql);
        echo "sacs"; //senha alterada com sucesso
     }
    else if ($valido2>0)
     {
         $sqlj = "update pessoaj set senha = '" . $hash ."' where email = '" . $email . "'";
         $consultar2 = mysqli_query($conexao,$sqlj);
         echo "sacs"; //senha alterada com sucesso
     }
}
if ($funcao == 2)   //nome
{

    $sqls1 = "select email from pessoaf where email = '$email'";
    $sqls2 = "select email from pessoaj where email = '$email'";
    
    $consultars     = mysqli_query($conexao,$sqls1);
    $consultars2    = mysqli_query($conexao,$sqls2);
    $valido         = mysqli_num_rows($consultars);
    $valido2        = mysqli_num_rows($consultars2);
    
    if ($valido>0)
    {
        $sql = "update pessoaf set nome = '" . $nnome ."' where email = '" . $email . "'";
        $consultar = mysqli_query($conexao,$sql);
        echo "nacs"; //nome alterada com sucesso
    }
    else if ($valido2>0)    //imagem
    {
        $sqlj = "update pessoaj set nome = '" . $nnome ."' where email = '" . $email . "'";
        $consultar2 = mysqli_query($conexao,$sqlj);
        echo "nacs"; //nome alterada com sucesso
    }
}