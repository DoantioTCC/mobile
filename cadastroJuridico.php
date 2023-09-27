<?php

$showAlert = false; 
$showError = false; 
$exists=false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
        include 'db/conexao.php';   

$cnpj = $_POST['cnpj'];
$nome = $_POST['nome'];
$cep = $_POST['cep'];
$numero = $_POST['numero'];
$complemento = $_POST['complemento'];
$ddd = $_POST['ddd'];
$tel = $_POST['tel'];
$email = $_POST['email'];
$senha = $_POST['senha'];


$sql = "Select * from pessoaj where email='$email'";
$inserir = mysqli_query($conexao,$sql);
$num = mysqli_num_rows($inserir); 


if($num == 0) {
    if($exists==false){
        $hash = password_hash($senha,PASSWORD_DEFAULT);

        $sql = "insert into pessoaj(cnpj,nome,cep,numero,complemento,ddd,tel,email,senha,datacriacao) VALUES 
('$cnpj','$nome','$cep','$numero','$complemento','$ddd','$tel','$email','$hash', current_timestamp())";

$inserir = mysqli_query($conexao,$sql);
if ($inserir) {
    $showAlert = true; 

    }
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