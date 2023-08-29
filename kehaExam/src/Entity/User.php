<?php

namespace Digi\Keha\Entity;
use Digi\Keha\Kernel\Model;

class User extends Model {
    
    private int $id;
    private string $name;
    private string $surname;
    
    public function getId() {
        return $this->id;
    }

    public function getSurname(){
        return $this->surname;
    }
    
    public function getName() {
        return $this->name;
    }

}