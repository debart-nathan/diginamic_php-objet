<?php

namespace Nath\Keha\Controller;
use Nath\Keha\Kernel\Views;


class Liste {
    public function index(){
        $view = new Views();
        $view->setHtml('liste.php');
        $view->render([
            'headContent' => '<title>Liste</title>',
            'footerContent' => '<p>footer</p>',
            'var'=>'<h1>Liste PHP</h1>',
        ]);
    }
}