<?php

require '../dao/connection.php';

$user = new Connection();

$query = "select * from users";

$usuarios = $user->select($query);

/* echo "<pre>";
print_r($usuarios);
echo "</pre>"; */

$email = $_POST['email'];
$senha = md5($_POST['senha']);



echo $email . "<br>";
echo $senha . "<br>";


foreach($usuarios as $user) {
    echo $user->email . "<br>" . $user->senha . "<br>" ;

    if($email == $user->email && $senha == $user->senha) {
        echo "Autenticado";
    } else {
        echo "invalido";
    }
}


?>