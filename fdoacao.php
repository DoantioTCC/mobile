<?php


include 'db/conexao.php';
session_start();

$email  = $_POST['email'];
$tipo  = $_POST['tipo'];
$descricao = $_POST['descricao'];
$estado = $_POST['estado'];
$requisicao = $_POST['requisicao'];
$imagem = $_POST['imagem'];
$usado = $_POST['usado'];
$whatever = false;

$sql = "select cpf from pessoaf where email = '" . $email . "'";
$sqlj = "select cnpj from pessoaj where email = '" . $email . "'";

$consultar = mysqli_query($conexao,$sql);
$consultar2 = mysqli_query($conexao,$sqlj);
$valido = mysqli_num_rows($consultar);
$valido2 = mysqli_num_rows($consultar2);


 if ($valido>0)                         // primeira opção
 {
    $cpfpf1 = mysqli_fetch_assoc($consultar);
    $cpfpf = implode($cpfpf1);
    if ($requisicao == 0)
    {
        $cpfreceptor = 0;
        $cnpjreceptor = 0;
        // return $cpfreceptor;
        // return $cnpjreceptor;
    }
    elseif ($requisicao == 1)
{
    $cpfreceptor = $cpfpf;
    $cpfpf = 0;
    $cnpjreceptor = 0;
    // return $cpfreceptor;
    // return $cpfpf;
    // return $cnpjreceptor;
}

    $insert = "insert into doacao (cpfdoador,cnpjdoador,identregador,placa,tipo,descricao,datadoacao,estado,cpfreceptor,cnpjreceptor,imagem,requisicao,concluido,usado)
    values('$cpfpf','0','0','0','$tipo','$descricao',current_date(),'$estado','$cpfreceptor','$cnpjreceptor','$imagem','$requisicao','0','$usado')";
    $insertq = mysqli_query($conexao,$insert);
    if ($insertq)
    {
        $whatever = true;
        
    }
    if ($whatever)
    {
        echo"gg";
    }
    else
    {
        echo"erro";
    }
 }

 if ($valido2>0)                    // Segunda opção
 {
    $cnpjpj1 = mysqli_fetch_assoc($consultar2);
    $cnpjpj = implode($cnpjpj1);
    if ($requisicao == 0)
    {
        $cpfreceptor = 0;
        $cnpjreceptor = 0;
        //return $cpfreceptor;
       // return $cnpjreceptor;
    }
    elseif ($requisicao == 1)
{
    $cnpjreceptor = $cnpjpj;
    $cnpjpj = 0;
    //return $cpfreceptor;
    //return $cpfpf;
}

    $insert = "insert into doacao (cpfdoador,cnpjdoador,identregador,placa,tipo,descricao,datadoacao,estado,cpfreceptor,cnpjreceptor,imagem,requisicao,concluido,usado)
    values('0','$cnpjpj','0','0','$tipo','$descricao',current_date(),'$estado','$cpfreceptor','$cpnjreceptor','$imagem','$requisicao','0','$usado')";

    $insertq = mysqli_query($conexao,$insert);
    if ($insertq)
    {
        $whatever = true;
        
    }
    if ($whatever)
    {
        echo"gg";
    }
    else
    {
        echo"erro";
    }

 }