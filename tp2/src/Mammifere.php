<?php

namespace Nath\Tp2;

abstract class Mammifere
{
    function __construct(protected bool $isFemale)
    {
    }
    public abstract function deplacer();

    public function allaitement(): void
    {

        if ($this->isFemale) {
            echo PHP_EOL . "allaitement success" . PHP_EOL;
        } else {
            echo PHP_EOL . "allaitement failed" . PHP_EOL;
        }
    }
}
