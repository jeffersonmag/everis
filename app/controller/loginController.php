<?php

class LoginController
{
    public function index()
    {
        $loader = new \Twig\Loader\FilesystemLoader('app/view');
        $twig = new \Twig\Environment($loader, [
            'auto_reload' => true
        ]);
        $template = $twig->load('login.html');
        $parametros['error'] = $_SESSION['msg_error'] ?? null;
        $conteudo = $template->render($parametros);
        echo $conteudo;
    }

    public function check()
    {

        try {
            $user = new Usuario;
            $user->setLogin($_POST['usuario']);
            $user->setPassword($_POST['password']);
            $user->validateLogin();
            header('Location: http://localhost/everis/home');
        } catch (Exception $e) {
            $_SESSION['msg_error'] = array('msg' => $e->getMessage(), 'count' => 0);
            header('Location: http://localhost/everis');
        }
    }
}
