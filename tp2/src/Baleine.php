<?php

namespace Nath\Tp2;

class Baleine extends Mammifere {
    function __construct(bool $sex)
    {
        parent::__construct($sex);
    }

    public function deplacer()
    {
        echo PHP_EOL . "Je nage" . PHP_EOL;
    }
}