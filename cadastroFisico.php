<?php

$showAlert = false; 
$showError = false; 
$exists=false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
        include 'db/conexao.php';   

$cpf = $_POST['cpf'];
$nome = $_POST['nome'];
$cep = $_POST['cep'];
$numero = $_POST['numero'];
$complemento = $_POST['complemento'];
$ddd = $_POST['ddd'];
$tel = $_POST['tel'];
$email = $_POST['email'];
$dia = $_POST['dia'];
$mes = $_POST['mes'];
$ano = $_POST['ano'];
$senha = $_POST['senha'];


$sql = "Select * from pessoaf where email='$email'";
$inserir = mysqli_query($conexao,$sql);
$num = mysqli_num_rows($inserir); 


if($num == 0) {
        $hash = password_hash($senha,PASSWORD_DEFAULT);

        $sql = "insert into pessoaf(cpf,nome,cep,numero,complemento,ddd,tel,email,nasc,senha,datacriacao) VALUES 
('$cpf','$nome','$cep','$numero','$complemento','$ddd','$tel','$email','$ano-$mes-$dia','$hash', current_timestamp())";

$inserir = mysqli_query($conexao,$sql);
if ($inserir) {
    $showAlert = true; 

    }

}
if($num>0)
{
    $exists="Username not Available";
}
}
if ($exists!=false){
    echo"EE";
}
if ($showAlert){
    echo"Sucesso";
}

// INSERT INTO doador(cpf,nome,cep,numero,complemento,ddd,tel,email,nasc,senha,permissao) VALUES 
// ('teste','teste','teste','12','teste','12','teste','teste','2020/12/20','assa',0)