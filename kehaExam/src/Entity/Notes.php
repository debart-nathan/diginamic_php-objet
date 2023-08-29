<?php

namespace Digi\Keha\Entity;
use Digi\Keha\Kernel\Model;

class Notes extends Model {
    private int $id;
    private int $note;
    private int $userId;

    public function getId() {
        return $this->id;
    }
    
    public function getNote() {
        return $this->note;
    }

    public function getUserId() {
        return $this->userId;
    }
}