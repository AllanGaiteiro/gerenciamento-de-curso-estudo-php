<?php
    //passo 1
    $servidor   = "localhost";
    $login    = "root";
    $password      = "";
    $banco      = "andes";
    $conexao    = mysqli_connect($servidor,$login,$password,$banco);

    //passo 2
    if(mysqli_connect_errno())
    {
        die("Conexão falhou".mysqli_connect_errno());
    }