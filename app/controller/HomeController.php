<?php

session_start();

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

            if (!$_SESSION['pedido']) {
            
                $colecCliente = Cliente::selecionaTodos();

                $loader = new \Twig\Loader\FilesystemLoader('app/view');
                $twig = new \Twig\Environment($loader);
                $template = $twig->load('createPdd.html');

                $params = array();
                $params['clientes'] = $colecCliente;

                $conteudo = $template->render($params);
                echo $conteudo;

            } else {
                header('Location: https://localhost/Projeto_PHP_OO/index.php?pagina=home&metodo=listarProdutos');
            }

        } else {
            header ('Location: https://localhost/Projeto_PHP_OO/index.php?pagina=erro&metodo=erroLogin ');
        }
    }

    public function listarProdutos() {

        if ($_SESSION['logado']) {
            try {
                $todosProduto = Produto::selecionarTodos();

                $loader = new \Twig\Loader\FilesystemLoader('app/view');
                $twig = new \Twig\Environment($loader);
                $template = $twig->load('selecaoPdt.html');

                $params = array();
                $params['produtos'] = $todosProduto;

                $conteudo = $template->render($params);
                echo $conteudo;

            } catch (Exception $e) {
                echo $e->getMessage();
            }

        } else {
            header ('Location: https://localhost/Projeto_PHP_OO/index.php?pagina=erro&metodo=erroLogin ');
        }
    }

    public function logout() {

        if ($_SESSION['logado']) {

            Produto::apagaPedidos();
            
            session_start();
            session_unset();
            session_destroy();
            header('Location: https://localhost/Projeto_PHP_OO/index.php');

        } else {
            header ('Location: https://localhost/Projeto_PHP_OO/index.php?pagina=erro&metodo=erroLogin ');
        }
    }
}