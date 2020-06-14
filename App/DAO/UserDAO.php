<?php

namespace App\DAO;

use App\DAO\Connection;
use App\Models\User;

class UserDAO extends Connection {

    public function show($username, $senha) {

        $query = "select id, username, senha, permissao, created_at from users where username = :username and senha = :senha";

        return $this->select($query, array(
            ':username' => $username,
            ':senha' => $senha
        ));

    }
    
    public function insert(User $user) {

        $query = 'insert into users(username, senha) values(:username, :senha)';        

        $this->query($query, array(
            ':username' => $user->__get('username'),
            ':senha' => $user->__get('senha')
        ));
    }

}


?>