<?php 
// require_once '../../utils/autoload.php';

$repository = new HeroRepository();

$hero = $repository->findHeroById(4);

var_dump($hero);

?>