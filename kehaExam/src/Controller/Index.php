<?php

namespace Digi\Keha\Controller;
use Digi\Keha\Kernel\Views;
use Digi\Keha\Kernel\AbstractController;
use Digi\Keha\Entity\Notes;

class Index extends AbstractController {

    public function index()
    {
        $view = new Views();
        $tab = Notes::getAll();
        $view->setHtml('index.html');
        $view->render([
            'flash' => $this->getFlashMessage(),
            'var' => 'je suis une variable',
            'var2' => $tab
        ]);
    }

    public function delete()
    {
        $result = false;
        $this->setFlashMessage('aucun enregistrement ne correspond','error');
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $result = Notes::delete($id);
        }
        if ($result) {
            $this->setFlashMessage("L'enrregistrement est bien supprimé", "success");
        }
        $this->index();
    }
}