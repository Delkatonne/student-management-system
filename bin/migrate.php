#!/usr/bin/env php
<?php
/**
 * Script de migration de base de données
 * Utilisation: php bin/migrate.php
 */

require_once __DIR__ . '/../config/config.php';

echo "🔄 Démarrage des migrations...\n\n";

try {
    // Connexion à MySQL
    $pdo = new PDO(
        'mysql:host=' . DB_HOST . ':' . DB_PORT,
        DB_USER,
        DB_PASSWORD,
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );

    // Charger et exécuter les migrations
    $migrationsPath = __DIR__ . '/../database/migrations';
    $migrationFiles = scandir($migrationsPath);
    sort($migrationFiles);

    foreach ($migrationFiles as $file) {
        if (pathinfo($file, PATHINFO_EXTENSION) === 'sql') {
            echo "Exécution de: $file\n";
            $sql = file_get_contents($migrationsPath . '/' . $file);
            
            // Diviser les requêtes SQL par ;
            $queries = array_filter(array_map('trim', explode(';', $sql)));
            
            foreach ($queries as $query) {
                if (!empty($query)) {
                    $pdo->exec($query);
                }
            }
            echo "✅ $file exécuté avec succès\n";
        }
    }

    echo "\n✅ Migrations terminées avec succès!\n";

} catch (Exception $e) {
    echo "❌ Erreur: " . $e->getMessage() . "\n";
    exit(1);
}