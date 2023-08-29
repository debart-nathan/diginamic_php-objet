<?php

class MyClass {
	private $tab = [
		1,
		2,
		3
	];

	public function getSetTab($value = false) {
		$i = 0;
		while (isset($this->tab[$i])) {
			yield "Ancienne valeur: ".$this->tab[$i];
			if($value) {
				$this->tab[$i] = $value;
				yield "Nouvelle valeur: ".$this->tab[$i];
			}
			$i++;
		}
	}
}

$objet = new MyClass();
$tab = $objet->getSetTab("z");

foreach ($tab as $value) {
	echo $value.PHP_EOL;
}

//already closed can't traverse again.
try{
    foreach ($tab as $value) {
        echo $value.PHP_EOL;
    }
}catch(Throwable $e){
    echo $e . PHP_EOL ;
}

class MyClass2 {
	
	private $a=	1;
	private $b=	2;
	public $c=	3;

	public function getSetTab($value = false) {
		foreach($this as $key=>$oldValue){
			yield "Ancienne valeur: $key = ".$oldValue;
			if($value) {
				$this->$key = $value;
				yield "Nouvelle valeur: $key = ". $this->$key;
			}

        }

	}
}

$objet2 = new MyClass2();
$tab = $objet2->getSetTab("z");

foreach ($tab as $value) {
	echo $value.PHP_EOL;
}

echo "objet c : " . $objet2->c . PHP_EOL ;