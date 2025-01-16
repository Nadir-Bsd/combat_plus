<?php 
require_once '../../utils/autoload.php';

$hero = new Hero('hero');
$monster = new Monster('monster');


var_dump($hero->getHp());

$monster->attack($hero);

var_dump($hero->getHp());
?>