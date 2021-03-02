<?php

class Core{

    public function start($request) {

        if (isset($request['pagina'])){
            $controller = ucfirst($request['pagina'].'Controller');
        } else {
            $controller = 'HomeController';
        }
        
        if (isset($request['metodo'])) {
            $method = $request['metodo'];
        } else {
            $method = 'index';
        }


        if (!class_exists($controller)){
            $controller = 'ErroController';
        }

        if (isset($request['id']) && $request['id'] != null){
            $id = $request['id'];
        } else {
            $id = null;
        }

        call_user_func_array(array(new $controller, $method), array(0 => $id));
    }
}