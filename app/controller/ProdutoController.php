<?php

class ProdutoController {

    public function index() {
        $loader = new \Twig\Loader\FilesystemLoader('app/view');
        $twig = new \Twig\Environment($loader);
        $template = $twig->load('registerProduto.html');

        echo $template->render();
        
    }
    
    public function listar() {

        try {
            $todosProduto = Produto::selecionarTodos();

            $loader = new \Twig\Loader\FilesystemLoader('app/view');
            $twig = new \Twig\Environment($loader);
            $template = $twig->load('todosProd.html');

            $params = array();
            $params['produtos'] = $todosProduto;
    
            $conteudo = $template->render($params);
            echo $conteudo;

        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function register() {

        Produto::register($_POST);

        header('Location: https://localhost/Projeto_PHP_OO/index.php?pagina=produto&metodo=listar');

    }

    public function single($params) {
        try {
            $singlePdt = Produto::buscarById($params);

            $loader = new \Twig\Loader\FilesystemLoader('app/view');
            $twig = new \Twig\Environment($loader);
            $template = $twig->load('singlePro.html');

            $params = array();
            $params['singles'] = $singlePdt;

            $conteudo = $template->render($params);
            echo $conteudo;
    
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    
}