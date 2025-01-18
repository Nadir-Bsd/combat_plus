<?php
    require_once '../utils/autoload.php';
    
    $heros = [];
    $manager = new HeroManager();

    $findHero = $manager->findHeroById(4);

    $hero1 = $manager->createHeroObject(0, "mr Test", 100, 100, 100, 100);
    $hero2 = $manager->createHeroObject(0, 'Robot', 1.5, 1.5, 1.5, 1.5);
    $hero3 = $manager->createHeroObject(0, 'golins', 1.1, 1.1, 1.1, 1.1);
    $hero4 = $manager->createHeroObject(0, 'elementaire', 1.6, 1.6, 1.6, 1.6);
    $heroCustom = $manager->createHeroObject(0, 'custom', 1.6, 1.6, 1.6, 1.6);

    array_push($heros, $hero1, $hero2, $hero3, $hero4, $heroCustom);

    // $manager->createHero("mr Test", 100, 100, 100, 100, 0);
    // $manager->createHero("Robot", 1.5, 1.5, 1.5, 1.5, 1);
    // $manager->createHero('golins', 1.1, 1.1, 1.1, 1.1, 1);
    // $manager->createHero('elementaire', 1.6, 1.6, 1.6, 1.6, 2);
    // $manager->deleteHero(5);
    $manager->deleteHeroByUserId(2);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/home.css">
</head>
<body>
    <main>
        <?php foreach($heros as $hero) { ?>
            <article>
                <h3><?= $hero->getName() ?></h3>
                <p>HP: <?= $hero->getHp() ?></p>
                <div>
                    <p>STRENGTH: <?= $hero->getStrength() ?></p>
                    <p>SPEED: <?= $hero->getSpeed() ?></p>
                    <p>DEFENSE: <?= $hero->getDefense() ?></p>
                </div>
            </article>
        <?php } ?>
    </main>
</body>
</html>