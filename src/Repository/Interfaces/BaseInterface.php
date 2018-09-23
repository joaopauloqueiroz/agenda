<?php
namespace Agenda\Repository\Interfaces;

interface BaseInterface
{
    public function login(string $user, string $pass);
    public function logout(string $user);
    public function create(array $data);
    public function get();
    public function update(int $id, array $data);
    public function delete(int $id);
    public function newTask(array $data);
}
