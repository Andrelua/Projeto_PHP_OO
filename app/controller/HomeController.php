<?php

class HomeController {

    public function index() {

        if ($_SESSION['logado']) {

            $loader = new \Twig\Loader\FilesystemLoader('app/view');
            $twig = new \Twig\Environment($loader);
            $template = $twig->load('home.html');

            echo $template->render();
            
        } else {
            header ('Location: https://localhost/Projeto_PHP_OO/index.php?pagina=erro&metodo=erroLogin');
        }
    }

    public function pedido() {

        if ($_SESSION['logado']) {

            $colecCliente = Cliente::selecionaTodos();

            $loader = new \Twig\Loader\FilesystemLoader('app/view');
            $twig = new \Twig\Environment($loader);
            $template = $twig->load('createPdd.html');

            $params = array();
            $params['clientes'] = $colecCliente;

            $conteudo = $template->render($params);
            echo $conteudo;

        } else {
            header ('Location: https://localhost/Projeto_PHP_OO/index.php?pagina=erro&metodo=erroLogin ');
        }

        
    }

    public function logout() {

        if ($_SESSION['logado']) {
            
            session_start();
            session_unset();
            session_destroy();
            header('Location: https://localhost/Projeto_PHP_OO/index.php');

        } else {
            header ('Location: https://localhost/Projeto_PHP_OO/index.php?pagina=erro&metodo=erroLogin ');
        }
    }
}