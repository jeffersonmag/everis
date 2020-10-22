<?php

class Core
{
    private $url;
    private $controller;
    private $method = 'index';
    private $params = array();
    private $usuario;
    private $error;
    private $entrada;

    public function __construct()
    {
        $this->usuario = $_SESSION['usr'] ?? null;
        $this->error   = $_SESSION['msg_error'] ?? null;

        if (isset($this->error)) {
            if ($this->error['count'] === 0) {
                $_SESSION['msg_error']['count']++;
            } else {
                unset($_SESSION['msg_error']);
            }
        }
    }

    public function start($urlGet)
    {

        if (isset($urlGet['url'])) {
            $this->url = explode('/', $urlGet['url']);
            $this->entrada = $this->url[0];
            $this->controller = $this->url[0] . 'Controller';
            array_shift($this->url);

            if (isset($this->url[0]) && $this->url != '') {
                $this->method = $this->url[0];
                array_shift($this->url);

                if (isset($this->url[0]) && $this->url != '') {
                    $this->params = $this->url;
                }
            }
        }

        if ($this->usuario) {
            $pg_permission = ['homeController'];

            if (!isset($this->controller) || !in_array($this->controller, $pg_permission)) {
                $this->controller = 'homeController';
                $this->method = 'index';
                $this->params = array($this->usuario['name_user']);
            }
        } else {
            $pg_permission = ['loginController', 'cadastrarController'];

            if (!isset($this->entrada)) {
                if (!isset($this->controller) || !in_array($this->controller, $pg_permission)) {
                    $this->controller = 'loginController';
                    $this->method = 'index';
                }
            }
            if ($this->entrada == 'cadastrar') {

                if (!isset($this->controller) || !in_array($this->controller, $pg_permission)) {
                    $this->controller = 'cadastrarController';
                    $this->method = 'index';
                }
            }
        }

        //} else {
        //    $this->controller = 'loginController';
        //    $this->method = 'index';


        if (!class_exists($this->controller)) {
            $this->controller = 'erroController';
        }


        return call_user_func_array(array(new $this->controller, $this->method), $this->params);
    }
}
