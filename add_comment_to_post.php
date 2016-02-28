<?php

require_once "bootstrap.php";

$postRepository = $entityManager->getRepository('Post');
$post = $postRepository->find(1);

$comment = new Comment;
$comment->setBody('My first comment!');

$post->addComment($comment);

$entityManager->persist($post);
$entityManager->flush();
