<?php

class HomeController
{
    public function index()
    {
        try {
            $usuario = new Usuario;
            //$usuario->setLogin($_SESSION['usr']['name_user']);
            //$usuariosEncontrados = $usuario->selecionaUsuarios();
            $loader = new \Twig\Loader\FilesystemLoader('app/view');
            $twig = new \Twig\Environment($loader);
            $template = $twig->load('home.html');
            $parametros = array();
            $parametros['usuario'] = $_SESSION['usr']['name_user'];
            $conteudo = $template->render($parametros);
            echo $conteudo;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function logout()
    {
        unset($_SESSION['usr']);
        session_destroy();
        header('Location: http://localhost/everis');
    }
}
