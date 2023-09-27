<?php

include 'db/conexao.php';
session_start();
$email = $_POST['email'];
$senha = $_POST['senha'];



$sql  = "select senha from pessoaf where email = '" . $email . "'";
$sqlj = "select senha from pessoaj where email = '" . $email . "'";

$consultar = mysqli_query($conexao,$sql);
$consultar2 = mysqli_query($conexao,$sqlj);
$valido = mysqli_num_rows($consultar);
$valido2 = mysqli_num_rows($consultar2);

if ($valido>0){
    $registro=mysqli_fetch_assoc($consultar);
    $registrostring = implode($registro);
    $verify = password_verify($senha, $registrostring);
    
    if ($verify || $verify2){
        echo"Sucesso";
    }
    else{
        echo"SI";
    }
}else if ($valido==0 && $valido2==0){
    echo "0";
}
if($valido2>0){
    $registro2=mysqli_fetch_assoc($consultar2);
    $registrostring2 = implode($registro2);
    $verify2 = password_verify($senha, $registrostring2);


    if ($verify || $verify2){
        echo"Sucesso";
    }
    else{
        echo"SI";
    }
}else if ($valido==0 && $valido2==0){
    echo "0";
}
