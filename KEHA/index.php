<?php
require "./vendor/autoload.php";

use Nath\Keha\Kernel\Dispatcher;

use Nath\Keha\Kernel\Model;


$objet = Model::getInstance();
var_dump($objet);

$dispacher = new Dispatcher;
$dispacher->dispatch();