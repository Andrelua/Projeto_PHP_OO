<?php

session_start();


class ClienteController {

    public function index() {

        if ($_SESSION['logado']) {

            try {
                $colecCliente = Cliente::selecionaTodos();
    
                $loader = new \Twig\Loader\FilesystemLoader('app/view');
                $twig = new \Twig\Environment($loader);
                $template = $twig->load('todosCli.html');
    
                $params = array();
                $params['clientes'] = $colecCliente;
    
                $conteudo = $template->render($params);
                echo $conteudo;
        
            } catch (Exception $e) {
                echo $e->getMessage();
            }
            
        } else {
            header('Location: index.php?pagina=erro&metodo=erroLogin');
        }

        
    }

    public function register() {
        if ($_SESSION['logado']) {

            try {

                $loader = new \Twig\Loader\FilesystemLoader('app/view');
                $twig = new \Twig\Environment($loader);
                $template = $twig->load('registerCli.html');
        
                echo $template->render();

            } catch (Exception $e) {
                echo $e->getMessage();
            }

        } else {
            header('Location: index.php?pagina=erro&metodo=erroLogin');
        }
    }

    public function cadastraCliente() {

        Cliente::cadastraCliente($_POST);

        header('Location: index.php?pagina=cliente');
        
    }
    
    public function single($params) {
        if ($_SESSION['logado']) {

            try {
                $singleCli = Cliente::buscarById($params);

                $pedidoCli = Cliente::buscaPddId($params);

                $loader = new \Twig\Loader\FilesystemLoader('app/view');
                $twig = new \Twig\Environment($loader);
                $template = $twig->load('singleCli.html');

                $params = array();
                $params['singles'] = $singleCli;
                $params['pedidos'] = $pedidoCli;

                $conteudo = $template->render($params);
                echo $conteudo;
        
            } catch (Exception $e) {
                echo $e->getMessage();
            }
            
        } else {
            header('Location: index.php?pagina=erro&metodo=erroLogin');
        }
    }

    
    public function atualizarDados() {
        if ($_SESSION['logado']) {

            Cliente::atualizarDados($_POST);

            header('Location: index.php?pagina=cliente');

        } else {
            header('Location: index.php?pagina=erro&metodo=erroLogin');
        }
    }

}