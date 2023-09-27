<?php
include 'db/conexao.php';

$email = $_POST['email'];

$sql = "select nome from pessoaf where email = '" . $email . "'";
$sqlj = "select nome from pessoaj where email = '" . $email . "'";

$consultar  = mysqli_query($conexao,$sql);
$consultar2 = mysqli_query($conexao,$sqlj);
$valido     = mysqli_num_rows($consultar);
$valido2    = mysqli_num_rows($consultar2);

if ($valido>0)
{
    $registro = mysqli_fetch_assoc($consultar);
    $registroString = implode($registro);
    echo $registroString;
}
else if ($valido2>0)
{
    $registro = mysqli_fetch_assoc($consultar);
    $registroString = implode($registro);
    echo $registroString;
}