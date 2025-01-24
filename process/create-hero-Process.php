<?php
require_once '../utils/autoload.php';

// call validator and check if the method is GET
$validator = new Validator();
$validator->checkMethods('GET');

// start session and for each hero in session, check if the hero name is equal to the name in the GET array
session_start();
$isHeroExist = [];
foreach ($_SESSION['heros'] as $hero) {
    $hero->getName() === $_GET['name'] ? $isHeroExist = $hero : "";
};

// if the hero does not exist, redirect to heros.php with an error message
if (empty($isHeroExist)) {
    header('location: ../public/heros.php?errorHero=404');
}

// if the hero exist, add it in the session as a 'heros' key
$_SESSION['heros'] = $isHeroExist;

// add hero in dataBase and get the id of the hero
$heroManager = new HeroManager();
$idHero = $heroManager->addHero($_SESSION['heros']);


// find the hero in the dataBase with the idHero
$hero = $heroManager->findHeroById($idHero);

// add idHero at user in dataBase
$userManager = new UserManager();
$user = $userManager->addIdHeroAtUser($_SESSION['user'], $idHero);


// add the hero Object to user Object
$_SESSION['user']->setHero($hero->setId($idHero));

header('location: ../public/fight.php');
exit;
?>