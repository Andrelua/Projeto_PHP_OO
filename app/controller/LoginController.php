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

    public function register() {

        $loader = new \Twig\Loader\FilesystemLoader('app/view');
        $twig = new \Twig\Environment($loader);
        $template = $twig->load('register.html');

        $params = array();

        $conteudo = $template->render($params);
        echo $conteudo;
    }

    
    public function cadastraFunc() {
        try {
            
            Funcionario::cadastraFunc($_POST);
            header('Location: index.php');
            
        } catch (Exeception $e) {
            header('Location: index.php?pagina=login&metodo=register');
        }

    }

    public function checkLogin() {
        
        if (Funcionario::checkLogin($_POST)) {

            header('Location: index.php?pagina=home');

        } else {
            header('Location: index.php');
        }   
        
    }
    
    public function checkGerente() {
        
        if (Funcionario::checkGerente($_POST)) {

            header('Location: index.php?pagina=login&metodo=register');

        } else {
            header('Location: index.php?pagina=erro&metodo=erroGerente');
        }   
        
    }
}