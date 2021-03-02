<?php
session_start();

class LoginController {

    public function index() {
        $loader = new \Twig\Loader\FilesystemLoader('app/view');
        $twig = new \Twig\Environment($loader);
        $template = $twig->load('login.html');

        $params = array();

        $conteudo = $template->render($params);
        echo $conteudo;
    }
    
    public function check($login, $senha) {
        
    }

    public function register() {

        $loader = new \Twig\Loader\FilesystemLoader('app/view');
        $twig = new \Twig\Environment($loader);
        $template = $twig->load('register.html');

        $params = array();

        $conteudo = $template->render($params);
        echo $conteudo;
    }
}