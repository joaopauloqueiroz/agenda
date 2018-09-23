<?php

require_once __DIR__.'/vendor/autoload.php';

use Agenda\Models\Usuario;

if (!empty($_POST)) {
    if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['senha'])) {
        $user = new Usuario();
        $user->create(array(
            ':name' => $_POST['name'],
            ':username' => $_POST['email'],
            ':password' => password_hash($_POST['senha'], PASSWORD_BCRYPT),
            ));
    }
}
