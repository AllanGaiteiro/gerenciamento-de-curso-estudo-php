<?php
include('settings.php');

function routes(/*string $page */)
{
    //print_r($_SERVER);
    global $urlInit;
    $url = $_SERVER['REDIRECT_URL'];
    //$uri = $_SERVER['REQUEST_URI'];
    $method = $_SERVER['REQUEST_METHOD'];
    ///$method === 'GET'
    // routes
    switch ($url) {
        case $urlInit . "/":
            include('public/pages/home.php');
            break;

        case $urlInit . "/home":
            include('public/pages/home.php');
            break;

        case $urlInit .  "/entrar":
            if ($method === 'POST') {
                include('login-service.php');
            }
            include('public/pages/login.php');
            break;


        case $urlInit .  "/cadastrar":
            if ($method === 'POST') {
                include('cadastrar-service.php');
            }
            include('public/pages/cadastro.php');
            break;

        case $urlInit .  "/listagem":
            include('public/pages/listagem.php');
            break;
        case $urlInit .  "/visualizar":
        include('public/pages/visualizar.php'/*. str_replace($url, '', $uri)*/);
            
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
