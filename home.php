<?php


include 'db/conexao.php';
session_start();
$funcao = $_POST['funcao'];
$email  = $_POST['email'];
$dados = [];
if ($email=="")
{
    echo "deslogado";
}
if ($funcao == 'nome')
{
    $sql = "select nome,imagem from pessoaf where email = '" . $email . "'";
    $sqlj = "select nome,imagem from pessoaj where email = '" . $email . "'";
    
    $consultar = mysqli_query($conexao,$sql);
    $consultar2 = mysqli_query($conexao,$sqlj);
    $valido = mysqli_num_rows($consultar);
    $valido2 = mysqli_num_rows($consultar2);
    if ($valido>0)
    {
        while($registro = mysqli_fetch_assoc($consultar))
        {
    $dados[] = $registro;
        }

    }
    if(count($dados)>0)
{
    echo json_encode($dados);
}
    else if ($valido2>0)
    {
        $registro = mysqli_fetch_assoc($consultar2);
        $dados[] = $registro;
        echo json_encode($dados);
    }
}






if ($funcao == 'deslogar')
{
    session_destroy();
}