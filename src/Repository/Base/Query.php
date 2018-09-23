<?php

namespace Agenda\Repository\Base;

use Agenda\Repository\Interfaces\BaseInterface;
use PDO;

class Query extends PDO implements BaseInterface
{
    private $pdo;
    private $table;

    public function __construct($table)
    {
        $this->table = $table;
        $this->pdo = new PDO('mysql:localhost=;dbname=agenda', 'root', '180461');
    }

    /**
     * Metodo que recebe a query.
     *
     * @param [type] $rawQuery
     * @param array  $params
     */
    public function query($rawQuery, $params = array())
    {
        $stmt = $this->pdo->prepare($rawQuery);
        $res = $this->setParams($stmt, $params);

        $stmt->execute();

        return $stmt;
    }

    /**
     * Metodo prasetar os params.
     *
     * @param [type] $statement
     * @param array  $parameters
     */
    private function setParams($statement, $parameters = array())
    {
        foreach ($parameters as $key => $value) {
            $this->setParam($statement, $key, $value);
        }
    }

    /**
     * Seta apenas um parametro.
     *
     * @param [type] $statement
     * @param [type] $key
     * @param [type] $value
     */
    private function setParam($statement, $key, $value)
    {
        $statement->bindParam($key, $value);
    }

    //================ metodos da interface ================//

    /**
     * Buscar todos os registros de um usuario.
     */
    public function get(): array
    {
        $id = $_COOKIE['user'];
        $stmt = $this->query("SELECT * FROM $this->table WHERE id = :id", array(
            ':id' => $id,
        ));

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * Criar um novo usuario.
     *
     * @param string $user
     * @param string $pass
     */
    public function create(array $data)
    {
        $res = $this->query('CALL sp_users_insert(:name, :username, :password)', $data);

        return $res;
    }

    /**
     * Atualizar um Registro.
     *
     * @param int   $id
     * @param array $data
     */
    public function update(int $id, array $data)
    {
    }

    /**
     * Deletar um Registro.
     *
     * @param int $id
     */
    public function delete(int $id)
    {
    }

    /**
     * Inserir nova tarefa.
     *
     * @param array $data
     */
    public function newTask(array $data)
    {
    }

    /**
     * Fazer login do usuario.
     *
     * @param string $user
     * @param string $pass
     */
    public function login(string $user, string $pass)
    {
        $stmt = $this->query("SELECT * FROM $this->table WHERE username = :username", array(
            ':username' => $user,
        ));
        $object = $stmt->fetch(PDO::FETCH_OBJ);

        if ($stmt->rowCount() && password_verify($pass, $object->password)) {
            $us = [
                    'id' => $object->id,
                    'name' => $object->name,
                ];
            setcookie('user', json_encode($us));

            return true;
        } else {
            return false;
        }
    }

    /**
     * Fazer logout do usuario.
     *
     * @param string $user
     */
    public function logout(string $user)
    {
    }
}
