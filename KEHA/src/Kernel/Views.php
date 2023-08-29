<?php

namespace Nath\Keha\Kernel;

//TODO templates
use Nath\Keha\Config\Config;

class Views {
    private string $html;

    public function setHtml(string $html):self{
        $this->html = Config::VIEWS.$html;
        return $this;
    }

    public function render(array $vars, ?string $html=null){
        if (!is_null($html)){
            $this->html = Config::VIEWS.$html;
        }
        extract($vars);
        
        $head = require(__DIR__."/../".Config::TEMPLATES."head.php");
        
        $header = require(__DIR__."/../".Config::TEMPLATES."header.php");
        include __DIR__."/../".$this->html;
        $footer = require(__DIR__."/../".Config::TEMPLATES."footer.php");

        
    }
}