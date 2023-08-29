<?php

namespace Nath\Tp2;

class Personne extends Mammifere
{
    function __construct(private string $name, private string $surname ,bool $sex)
    {
        parent::__construct($sex);
    }

    public function deplacer(){
        echo PHP_EOL . "Je marche" . PHP_EOL;
    }

}
