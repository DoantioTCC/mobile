<?php


include 'db/conexao.php';
session_start();
$funcao = $_POST['funcao'];
$email  = $_POST['email'];
$senhau = $_POST['senhau']; // senha usuario


if ($funcao == 'vsenha')  // validar senha
{
    $sql = "select senha from pessoaf where email = '" . $email . "'";
    $sqlj = "select senha from pessoaj where email = '" . $email . "'";
    
    $consultar = mysqli_query($conexao,$sql);
    $consultar2 = mysqli_query($conexao,$sqlj);
    $valido = mysqli_num_rows($consultar);
    $valido2 = mysqli_num_rows($consultar2);
    
    if ($valido>0)
    {
        $registro = mysqli_fetch_assoc($consultar);
        $registroString = implode($registro);
        $verify         = password_verify($senhau, $registroString);
        if ($verify)
        {
            echo "Sucesso";
        }
    }
    else if ($valido2>0)
    {
        $registro = mysqli_fetch_assoc($consultar);
        $registroString = implode($registro);
        $verify         = password_verify($senhau, $registroString);
        if ($verify)
        {
            echo "Sucesso";
        }
    }
}