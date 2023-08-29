<?php

namespace Digi\Keha\Controller;

use Digi\Keha\Kernel\Views;
use Digi\Keha\Kernel\AbstractController;
use Digi\Keha\Entity\User;
use Digi\Keha\Entity\Notes;

class Users extends AbstractController
{
    public function index()
    {
        $view = new Views();
        $users = User::getAll();
        $tab = [];
        foreach($users as $user){
            array_push($tab,[
                "user"=>$user,
                "notes"=>Notes::getByAttributes(["userId"=>$user->getId()])
            ]);
        }
        $view->setHtml('users.html');
        $view->render([
            'flash' => $this->getFlashMessage(),
            'userList' => $tab
        ]);
    }

    public function loadEdit()
    {
        if (isset($_GET['mode'])) {
            $view = new Views();
            $id = "";
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
            }

            $view->setHtml('createUser.html');
            $view->render([
                'flash' => $this->getFlashMessage(),
                'method' => $_GET['mode'],
                'id' => $id

            ]);
        } else {
            $this->index();
        }
    }



    public function delete()
    {
        $result = false;
        $this->setFlashMessage('aucun enregistrement ne correspond', 'error');
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $result = User::delete($id);
        }
        if ($result) {
            $this->setFlashMessage("L’enregistrement est bien supprimé", "success");
        }
        $this->index();
    }

    public function edit()
    {
        $result = false;
        $this->setFlashMessage('aucun enregistrement ne correspond', 'error');
        if (isset($_POST['id'])) {
            if (
                preg_match("/^[a-zA-Z][a-zA-Z'\s-]{1,20}$/", $_POST['name']) &&
                preg_match("/^[a-zA-Z][a-zA-Z'\s-]{1,20}$/", $_POST['surname'])
            ) {
                $id = $_POST['id'];
                $editDatas = [
                    "name" => $_POST["name"],
                    "surname" => $_POST["surname"]
                ];
                $result = User::update($id, $editDatas);
            }else{
                $this->setFlashMessage("La validation des donné", "error");
            }
        }
        if ($result) {
            $this->setFlashMessage("L’enregistrement est bien édité", "success");
        }
        $this->index();
    }
    public function create()
    {
        $result = false;
        $this->setFlashMessage('aucun enregistrement ne correspond', 'error');
        if (isset($_POST['name']) && isset($_POST['surname'])) {
            if (
                preg_match("/^[a-zA-Z][a-zA-Z'\s-]{1,20}$/", $_POST['name']) &&
                preg_match("/^[a-zA-Z][a-zA-Z'\s-]{1,20}$/", $_POST['surname'])
            ) {
                $createDatas = [$_POST['name'],$_POST['surname']] ;

                $result = User::insert($createDatas);
            }else{
                $this->setFlashMessage("La validation des donné a échouer", "error");
            }
        }
        if ($result) {
            $this->setFlashMessage("L’enregistrement est bien créer", "success");
        }

        $this->index();
    }
}
