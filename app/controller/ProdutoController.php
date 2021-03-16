<?php

class ProdutoController {

    public function index() {

        if ($_SESSION['logado']) {

            if ($_SESSION['tipo'] == 'Gerente') {

                $loader = new \Twig\Loader\FilesystemLoader('app/view');
                $twig = new \Twig\Environment($loader);
                $template = $twig->load('registerProduto.html');

                echo $template->render();

            } else {
                header ('Location: https://localhost/Projeto_PHP_OO/index.php?pagina=erro&metodo=erroValidacao');
            }

        } else {
            header ('Location: https://localhost/Projeto_PHP_OO/index.php?pagina=erro&metodo=erroLogin');
        }
        
    }
    
    public function listar() {

        if ($_SESSION['logado']) {

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

        } else {
            header ('Location: https://localhost/Projeto_PHP_OO/index.php?pagina=erro&metodo=erroLogin ');
        }

    }

    public function register() {

        Produto::register($_POST);

        header('Location: https://localhost/Projeto_PHP_OO/index.php?pagina=produto&metodo=listar');

    }

    public function update() {

        Produto::update($_POST);

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

    public function singleCar($params) {
        try {
            $singlePdt = Produto::buscarById2($params);

            $loader = new \Twig\Loader\FilesystemLoader('app/view');
            $twig = new \Twig\Environment($loader);
            $template = $twig->load('carSingle.html');

            $params = array();
            $params['singles'] = $singlePdt;

            $conteudo = $template->render($params);
            echo $conteudo;
    
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function updateCar() {

        Produto::updateCar($_POST);

        header('Location: https://localhost/Projeto_PHP_OO/index.php?pagina=produto&metodo=listar');

    }

    public function delete($params) {
        
        Produto::deleteById($params);
        
        header('Location: https://localhost/Projeto_PHP_OO/index.php?pagina=produto&metodo=listar');
    }
    
    public function deleteCar($params) {
        
        Produto::deletePdtCar($params);
        
        header('Location: https://localhost/Projeto_PHP_OO/index.php?pagina=pedido&metodo=carrinhoView');
    }
}