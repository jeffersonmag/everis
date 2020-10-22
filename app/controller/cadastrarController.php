<?php

class CadastrarController
{
    public function index()
    {
        $loader = new \Twig\Loader\FilesystemLoader('app/view');
        $twig = new \Twig\Environment($loader, [
            'auto_reload' => true
        ]);
        $template = $twig->load('cadastro.html');
        $parametros['error'] = $_SESSION['msg_error'] ?? null;
        $conteudo = $template->render($parametros);
        echo $conteudo;
    }

    public function newuser()
    {
        try {
            $user = new Usuario;
            $user->setLogin($_POST['usuario']);
            $user->setPassword($_POST['senha']);
            $user->setName($_POST['nome']);
            $user->setCpf($_POST['cpf']);
            $user->cadastroUsuario();
            header('Location: http://localhost/everis');
        } catch (Exception $e) {
            $_SESSION['msg_error'] = array('msg' => $e->getMessage(), 'count' => 0);
            header('Location: http://localhost/everis/cadastrar');
        }
    }
}