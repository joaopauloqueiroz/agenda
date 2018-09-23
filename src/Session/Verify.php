<?php
namespace Agenda\Session;

class Verify
{

public $error;
public $success;
    public function error()
    {
        $this->error = "/Agenda/";
        setcookie('error', "<strong>Error </strong>Verifique os dados e tente novamente!!");
        return header("location: $this->error");
    }   

    public function success(){
        $this->success = "/Agenda/logado.php";
        setcookie('error');
        setcookie('logado', true);
		return header("location: $this->success");
    }

}
