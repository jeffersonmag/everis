<?php

class Usuario
{
    private $id;
    private $name;
    private $cpf;
    private $login;
    private $password;

    public function setLogin($login)
    {
        $this->login = $login;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setCpf($cpf)
    {
        $this->cpf = $cpf;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getLogin()
    {
        return $this->login;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getCpf()
    {
        return $this->cpf;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function validateLogin()
    {
        $conexao = Conexao::getConn();

        $sql = "SELECT * FROM usuarios WHERE usuario = :login";
        $sql = $conexao->prepare($sql);
        $sql->bindValue(':login', $this->login);
        $sql->execute();

        if ($sql->rowCount()) {
            $result = $sql->fetch();
            if ($result['senha'] === $this->password) {
                $_SESSION['usr'] = array('id_user' => $result['id_user'], 'name_user' => $result['nome']);
                return true;
            }
        }
        throw new \Exception('Login Inválido!');
    }

    public function selecionaUsuarios()
    {
        $conexao = Conexao::getConn();

        $sql = "SELECT * FROM usuarios WHERE usuario = :login";
        $sql = $conexao->prepare($sql);
        $sql->bindValue(':login', $this->login);
        $sql->execute();

        $resultado = array();

        while ($row = $sql->fetchObject('Usuario')) {
            $resultado[] = $row;
        }

        if (!$resultado) {
            throw new \Exception("Não foi encontrado nenhum registro!");
        }

        return $resultado;
    }

    public function cadastroUsuario()
    {
        $conexao = Conexao::getConn();
        $sql = "INSERT INTO usuarios (nome, cpf, id_perfil_usuario, usuario, senha) VALUES (:nome, :cpf, 1, :usuario, :senha)";
        $sql = $conexao->prepare($sql);
        $sql->bindValue(':nome', $this->name);
        $sql->bindValue(':cpf', $this->cpf);
        $sql->bindValue(':usuario', $this->login);
        $sql->bindValue(':senha', $this->password);


        if ($sql->execute()) {
            echo "Cadastro feito com sucesso";
        } else {
            throw new \Exception("Problema ao inserir no banco de dados!");
        }
    }
}
