<?php 
require_once '../utils/autoload.php';

$heros = [];
$manager = new HeroManager();

$heros[] = $manager->createHeroObject(0, "mr Test", 100, 100, 100, 100);
$heros[] = $manager->createHeroObject(0, 'Robot', 1.5, 1.5, 1.5, 1.5);
$heros[] = $manager->createHeroObject(0, 'Assassin', 1.2, 1.2, 1.2, 1.2);
$heros[] = $manager->createHeroObject(0, 'Big G', 1.6, 1.6, 1.6, 1.6);



session_start();
$_SESSION['heros'] = $heros;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select Your Hero</title>
    <link rel="stylesheet" href="./css/heros.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
</head>

<body>
    <main>
        <!-- Victory/Defeat Messages -->
        <?php if (isset($_GET['victory'])): ?>
            <div class="message <?= $_GET['victory'] === 'hero' ? 'success' : 'error' ?>">
                <p><?= $_GET['victory'] === 'hero' ? "Hero Wins!" : "Monster Wins!" ?></p>
            </div>
        <?php endif; ?>
        <?php if (isset($_GET['errorHero'])): ?>
            <div class="message error">
                <p>This hero does not exist!</p>
            </div>
        <?php endif; ?>

        <!-- Heroes Selection -->
        <section class="heroes-grid">
            <?php foreach ($_SESSION['heros'] as $hero): ?>
                <article class="hero-card" onclick="window.location.href = '../process/create-hero-Process.php?name=<?= $hero->getName() ?>'">
                    <h3><?= $hero->getName() ?></h3>
                    <p class="hero-hp">HP: <?= $hero->getHp() ?></p>
                    <div class="hero-stats">
                        <p>Strength: <?= $hero->getStrength() ?></p>
                        <p>Speed: <?= $hero->getSpeed() ?></p>
                        <p>Defense: <?= $hero->getDefense() ?></p>
                    </div>
                </article>
            <?php endforeach; ?>
        </section>
    </main>
</body>

</html>