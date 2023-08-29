<?php
namespace Nath\Keha\Entity;

use Nath\Keha\Kernel\Model;

class Notes  extends Model{
    private int $id;
    private int $note;

    public function getNote(){
        $this->note;
    }

    public function getId(){
        $this->id;
    }

}