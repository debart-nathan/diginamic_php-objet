<?php

require("./vendor/autoload.php");

use Nath\Tp2\Baleine;
use Nath\Tp2\Personne;

$pm = new Personne("Martin","Smith",false);
$pf = new Personne("Marta","Smith",true);

$bm = new Baleine(false);

$pf->allaitement();

$pm->allaitement();

$pm->deplacer();

$bm->deplacer();

