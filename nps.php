<?php

require 'dao/connection.php';

$user = new Connection();

$query = "select * from users";

$user->select($query);

print_r($user->select($query));

?>