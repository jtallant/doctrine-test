<?php

require_once "bootstrap.php";

$post = new Post;
$post->setName("My first post");

$entityManager->persist($post);
$entityManager->flush();

echo "Created Post with ID " . $post->getId() . "\n";
