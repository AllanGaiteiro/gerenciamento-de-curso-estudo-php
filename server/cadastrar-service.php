<?php
require_once("banco/conexao.php");
// adicionar variaveis de sessao
session_start();


if (isset($_POST["login"]) && $_POST["password"]) {
    $usuario    = $_POST["login"];
    $senha      = $_POST["password"];
    $usuario    = $_POST["confirm-passwor"];
    $senha      = $_POST["name"];
    $usuario    = $_POST["email"];
    $senha      = $_POST["cpf"];
    $usuario    = $_POST["photo"];

    $verification = "SELECT * ";
    $verification .= "FROM clientes ";
    $verification .= "WHERE usuario = '{$usuario}' and senha = '{$senha}' ";

    if($_POST["password"] === $_POST["confirm-passwor"]){
        $mensagem = "Confirmar senha esta com senha diferente.";
    }else{
        $inserir    = "INSERT INTO transportadoras ";
        $inserir    .= "(nometransportadora,endereco,cidade,estadoID,cep,cnpj,telefone) ";
        $inserir    .= "VALUES ";
        $inserir    .= "('$nome','$endereco','$cidade', $estado, '$cep','$cnpj','$telefone')";
        
        $operacao_inserir = mysqli_query($conexao,$inserir);
        if(!$operacao_inserir) {
            die("Erro no banco");
        }  
    }
}
// fechar
mysqli_close($conexao);
