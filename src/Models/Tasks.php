<?php
namespace Agenda\Models;

use Agenda\Repository\Base\Query;

class Tasks extends Query
{

    private $pdo;
    public function __construct()
    {
      $this->pdo = new Query('tasks');
    }

  public function getAll(){
     return $this->pdo->get();
  }
}
