<?php
require_once '../utils/autoload.php';

// Crée la liste des monstres
$monsters = [];
$monsters[] = new Monster('Elementaire', 1.2, 1.2, 1.2, 1.2);
$monsters[] = new Monster('Goblins', 0.9, 0.9, 0.9, 0.9);
$monsters[] = new Monster('Orc', 1, 1, 1, 1);
$monsters[] = new Monster('Slim', 10000000, 0, 0, 0);
$monsters[] = new Monster('Test', 0.8, 1.5, 8, 0.2);

// Monstre aléatoire
$monster = $monsters[rand(0, count($monsters) - 1)];

// Récupère le héros depuis la session
session_start();
$hero = $_SESSION['user']->getHero();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script defer src="./scripts/fight.js"></script>
    <link rel="stylesheet" href="./css/fight.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <title>Combat Arena</title>
</head>

<body>
    <main class="arena">
        <!-- Hero Section -->
        <article class="card hero-card">
            <h3 class="name hero"><?= $hero->getName() ?></h3>
            <p class="stat">HP: <span class="value hero"><?= $hero->getHp() ?></span></p>
            <div class="stats">
                <p>Strength: <span class="value hero"><?= $hero->getStrength() ?></span></p>
                <p>Speed: <span class="value hero"><?= $hero->getSpeed() ?></span></p>
                <p>Defense: <span class="value hero"><?= $hero->getDefense() ?></span></p>
            </div>
        </article>

        <!-- Monster Section -->
        <article class="card monster-card">
            <h3 class="name monster"><?= $monster->getName() ?></h3>
            <p class="stat">HP: <span class="value monster"><?= $monster->getHp() ?></span></p>
            <div class="stats">
                <p>Strength: <span class="value monster"><?= $monster->getStrength() ?></span></p>
                <p>Speed: <span class="value monster"><?= $monster->getSpeed() ?></span></p>
                <p>Defense: <span class="value monster"><?= $monster->getDefense() ?></span></p>
            </div>
        </article>
    </main>
</body>

</html>
