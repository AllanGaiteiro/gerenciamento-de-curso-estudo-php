<?php
require_once("banco/conexao.php");
// adicionar variaveis de sessao
session_start();


if (isset($_POST["login"])) {
    echo $_POST["login"];
    $usuario    = $_POST["login"];
    $senha      = $_POST["password"];

    $verification = "SELECT * ";
    $verification .= "FROM clientes ";
    $verification .= "WHERE usuario = '{$usuario}' and senha = '{$senha}' ";

    $acesso = mysqli_query($conexao, $verification);
    if (!$acesso) {
        die("Falha na consulta ao banco");
    }

    $informacao = mysqli_fetch_assoc($acesso);

    if (empty($informacao)) {
        $mensagem = "Login sem sucesso.";
    } else {
        $_SESSION["user_portal"] = $informacao["clienteID"];
        header("location:listagem");
    }
}
// fechar
mysqli_close($conexao);
?>