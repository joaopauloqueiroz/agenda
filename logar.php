<?php
    require_once __DIR__.'/vendor/autoload.php';
    use Agenda\Models\Usuario;
    use Agenda\Session\Verify;

    $status = new Verify();

    if (!empty($_POST['username']) && !empty($_POST['username'])) {
        $user = new Usuario();
        $res = $user->login($_POST['username'], $_POST['password']);
        if ($res) {
            $status->success();
        } else {
            $status->error();
        }
    } else {
        $status->error();
    }
