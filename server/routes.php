<?php
function routes(/*string $page */)
{
    //print_r($_SERVER);
    $url = $_SERVER['REQUEST_URI'];
    $urlInit = "/gerenciamento-de-curso-php";
    $method = $_SERVER['REQUEST_METHOD'];
    if ($method === 'GET') {

        // routes
        switch ($url) {
            case $urlInit . "/":
                include('public/pages/home.php');
                break;

            case $urlInit . "/home":
                include('public/pages/home.php');
                break;

            case $urlInit .  "/entrar":
                include('public/pages/login.php');
                break;

            case $urlInit .  "/cadastrar":
                include('public/pages/cadastro.php');
                break;

            case $urlInit .  "/listagem":
                include('public/pages/listagem.php');
                break;

            case $urlInit .  "/adicionar-curso":
                include('public/pages/adcionar-editar.php');
                break;

            case $urlInit .  "/editar-curso":
                include('public/pages/adcionar-editar.php');
                break;

            case $urlInit .  "/sobre":
                include('public/pages/sobre.php');
                break;

            case $urlInit .  "/contato":
                include('public/pages/cotato.php');
                break;
            default:
                include('public/pages/login.php');
                break;
        }
    }
}
