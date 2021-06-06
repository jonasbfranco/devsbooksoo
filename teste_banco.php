<?php
require 'config.php';

class TesteJonas {

    //Testar inclusao de dados na tabela (users) usuario
    public function insert($email, $password, $name, $birthdate, $token) {
    
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $token = md5(time().rand(0, 9999));

        $email = 'teste@inclusao.com.br';
        $password = $hash;
        $birthdate = '05/10/1978';
        $token = $token;
        

        $sql = $this->pdo->prepare("INSERT INTO users (
                email, password, name, birthdate, token
            ) VALUES (
                :email, :password, :name, :birthdate, :token
            )");


        $sql->bindValue(':email', $email);
        $sql->bindValue(':password', $password);
        $sql->bindValue(':name', $name);
        $sql->bindValue(':birthdate', $birthdate);
        $sql->bindValue(':token', $token);
        $sql->execute();

        return true;
    }



}


insert('teste@inclusao.com.br', '123', 'Teste Inserção', '05/10/1978', $token);
    

    
