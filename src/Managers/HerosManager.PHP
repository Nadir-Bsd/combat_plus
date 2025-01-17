<?php 
require_once '../../utils/autoload.php';

// $hero = new Hero();
// $monster = new Monster('monster');

$repository = new HeroRepository();

// var_dump($repository->findHeroById(2));
$hero = $repository->findHeroById(3);
var_dump($hero);
// var_dump($hero);
// var_dump($monster);
?>