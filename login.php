<?php

include 'db/conexao.php';
session_start();

$email       = $_POST['email'];
$senha       = $_POST['senha'];
$ip          = $_SERVER["REMOTE_ADDR"];
$logado      = false;

$sql         = "select senha from pessoaf where email = '"    . $email . "'";
$sqlj        = "select senha from pessoaj where email = '"   . $email . "'";
$sqlLogado   = "delete from login where email = '"           . $email . "'";



$consultar   = mysqli_query($conexao,$sql);
$consultar2  = mysqli_query($conexao,$sqlj);
$valido      = mysqli_num_rows($consultar);
$valido2     = mysqli_num_rows($consultar2);


if ($valido>0)
{
    $registro       = mysqli_fetch_assoc($consultar);
    $registrostring = implode($registro);
    $verify         = password_verify($senha, $registrostring);
    
    if ($verify)
    {
        echo"Sucesso";
        $excluirlogin = mysqli_query($conexao,$sqlLogado);
        // $sqlnome = "select email from pessoaf where email = '" . $email . "'";
        // $nomea = mysqli_query($conexao,$sqlnome);
        // $nome = mysqli_fetch_assoc($nomea);
        // $nomestring = implode($nome);
        $_SESSION['email'] = $email;
    }
    else
    {
        echo"SI";
//         $sqlf = "insert into login(email,ip,login_time,senha) VALUES 
// ('$email','$ip',current_timestamp(),'$senha')";


$sqlf = "SELECT MAX(id) FROM login";
$inserir = mysqli_query($conexao,$sqlf);
$id2 = mysqli_fetch_assoc($inserir);
$id = implode($id2);
$id1 = $id+1;
$falha = "insert into login(id,email,ip,login_time,senha) VALUES 
('$id1','$email','$ip',current_timestamp(),'$senha')";
$inserirfalha = mysqli_query($conexao,$falha);
    }
}
else if ($valido==0 && $valido2==0)
{
    echo "0";
}
if($valido2>0)
{
    $registro2          = mysqli_fetch_array($consultar2);
    $registrostring2    = implode($registro2);
    $verify2            = password_verify($senha, $registrostring2);


    if ($verify2)
    {
        echo"Sucesso";
        $excluirlogin   = mysqli_query($conexao,$sqlLogado);
        // $sqlnome = "select nome from pessoaf where email = '" . $email . "'";
        // $nomea = mysqli_query($conexao,$sqlnome);
        // $nome = mysqli_fetch_assoc($nomea);
        // $nomestring = implode($nome);
        $_SESSION['email'] = $email;
    }
    else
    {
        echo"SI";
//         $sqlf = "insert into login(id,email,ip,login_time,senha) VALUES 
// ('$id','$email','$ip',current_timestamp(),'$senha')";

$sqlf = "SELECT MAX(id) FROM login";
$inserir = mysqli_query($conexao,$sqlf);
$id2 = mysqli_fetch_assoc($inserir);
$id = implode($id2);
$id1 = $id+1;
$falha = "insert into login(id,email,ip,login_time,senha) VALUES 
('$id1','$email','$ip',current_timestamp(),'$senha')";
$inserirfalha = mysqli_query($conexao,$falha);


$inserir = mysqli_query($conexao,$sqlf);



    }
}
else if ($valido==0 && $valido2==0)
{
    echo "0";
}
