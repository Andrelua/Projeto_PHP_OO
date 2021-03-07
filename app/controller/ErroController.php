<?php

class ErroController {

    public function index(){
        echo "Página não encontrada!";
    }

    public function erroLogin(){
        $loader = new \Twig\Loader\FilesystemLoader('app/view');
        $twig = new \Twig\Environment($loader);
        $template = $twig->load('erroLogin.html');

        echo $template->render();
    }

    public function erroValidacao(){
        
        $loader = new \Twig\Loader\FilesystemLoader('app/view');
        $twig = new \Twig\Environment($loader);
        $template = $twig->load('erroValidacao.html');

        echo $template->render();
    }
}

