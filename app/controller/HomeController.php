<?php

class HomeController {

    public function index() {
        $loader = new \Twig\Loader\FilesystemLoader('app/view');
        $twig = new \Twig\Environment($loader);
        $template = $twig->load('home.html');

        echo $template->render();
    }

    public function pedido() {
        $loader = new \Twig\Loader\FilesystemLoader('app/view');
        $twig = new \Twig\Environment($loader);
        $template = $twig->load('createPdd.html');

        echo $template->render();
    }

    public function logout() {
        
    }
}