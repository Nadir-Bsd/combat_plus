<?php

spl_autoload_register(function ($className) {
    // Base directory (src)
    $baseDir = __DIR__ . '/../src/';
    
    // Déterminer le répertoire en fonction du suffixe du nom de la classe
    switch (true) {
        case substr($className, -10) === 'Repository':
            $directory = 'Repositories';
            break;
        case substr($className, -7) === 'Manager':
            $directory = 'Managers';
            break;
        case substr($className, -6) === 'Mapper':
            $directory = 'Mappers';
            break;
        case substr($className, -9) === 'Interface':
            $directory = 'Interfaces';
            break;
        case substr($className, -6) === 'Traits':
            $directory = 'Traits';
            break;
        case substr($className, -8) === 'Strategy':
            $directory = 'Validator/Strategies';
            break;
        case substr($className, -9) === 'Validator':
            $directory = 'Validator';
            break;
        default:
            $directory = 'Entities';
            break;
    }

    // Construire le chemin complet du fichier
    $file = $baseDir . $directory . '/' . $className . '.php';

    // Charge le fichier si trouvé
    if (file_exists($file)) {
        require $file;
    }
});