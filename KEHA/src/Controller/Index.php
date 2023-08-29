<?php

namespace Nath\Keha\Controller;
use Nath\Keha\Kernel\Views;
use Nath\Keha\Entity\Notes;
use Nath\Keha\Entity\User;

class Index {
    public function index(){
        $view = new Views();
        $tab = User::getAll();
        $view->setHtml('index.html');
        $view->render([
            'var'=>'je suis une variable',
            'var2'=>$tab
        ]);
    }

    public function delete()
    {
        if(isset($_GET["id"])){
            $id = $_GET["id"];
            $result = Notes::delete($id);
        }
        if($result){
            $this->index();
        }else {
            echo "aucun enregistrement ne correspond";
        }
        
    }
}