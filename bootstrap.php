<?php
// bootstrap.php
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

require_once "./vendor/autoload.php";

// Create a simple "default" Doctrine ORM configuration for Annotations
$isDevMode = true;
$config = Setup::createAnnotationMetadataConfiguration([__DIR__."/src"], $isDevMode);

// database configuration parameters
$conn = [
    'driver' => 'pdo_sqlite',
    'path' => __DIR__ . '/db.sqlite',
];

// obtaining the entity manager
$entityManager = EntityManager::create($conn, $config);
