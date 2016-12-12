<?php
use Doctrine\ORM\Tools\Setup;
require_once "src/main/resources/vendor/autoload.php";

$isDevMode = false;
$config = Setup::createAnnotationMetadataConfiguration(array(__DIR__."/src/main/php"), $isDevMode);

// Konfigurasi Database
$conn = array(
    'driver' => 'pdo_sqlite',
    'path' => __DIR__ . '/db.sqlite',
);

// Persiapan session Entity Manager database
$entityManager = \Doctrine\ORM\EntityManager::create($conn, $config);

// Buat Table berdasarkan metadata
$schemaTool = new \Doctrine\ORM\Tools\SchemaTool($entityManager);
$classes = $entityManager->getMetadataFactory()->getAllMetadata();
$schemaTool->createSchema($classes);