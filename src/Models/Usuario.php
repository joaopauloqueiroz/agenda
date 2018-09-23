<?php

namespace Agenda\Models;

use Agenda\Repository\Base\Query;

/**
     * Classe de usuario.
     */
    class Usuario extends Query
    {
        protected $name;
        protected $email;
        protected $senha;
        private $query;

        public function __construct()
        {
            $this->query = new Query('users');
        }

        public function login(string $user, string $pass)
        {
            return $this->query->login($user, $pass);
        }

        public function create($data)
        {
            $res = $this->query->create($data);
            if ($res) {
                echo "<script>window.location.assign('http://localhost/Agenda/')</script>";
            } else {
                echo "<script>window.location.assign('http://localhost/Agenda/create-user.php')</script>";
            }
        }
    }
