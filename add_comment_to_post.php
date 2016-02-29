<?php

// Adam:
// I see what you mean now. Cascade persist in your example
// will work if you change the bad method call like I said.
// The comment will have a post ID in the database.
// But you are expecting the comment object to be able to access
// the ID of the post even when you never explicitly updated both sides
// of the relationship.
//
// So if you were to add a getPost() method to Comment class,
// then you would expect to be able to $comment->getPost()->getId()
// after adding the comment to the post and persisting the post (as in your example).
//
// It is true that the FK will exist in the DB but you will not be able
// to access the FK by comment->gePost()->getId() if you do not update both
// sides of the relationship through PHP code. I don't see that as an issue though.
// It makes sense to express the relationships and keep them in sync through PHP.
// This will make the code more readable and allow you to avoid more cascade operations.
//
// If Comment never exists unless it is attached to a post, it would make sense to express
// that by requiring a Post in the constructor. If it can exist w/o a post, then of course
// you wouldn't do this. But for most objects, this way of doing it works just fine and IMO
// is very readable.
//
// I would also add any property that is not nullable to the constructor of both objects as well.
// I always add a public static fromArray method to my objects when I do this, so it is easier to construct
// them from request input and I don't have to care what order the constructor args are in.
//
// Post __construct($title, $foo)
// Post::fromArray(['title' => 'The title', 'foo' => 'bar'])
// Post::fromArray($request->only('title', 'foo'))

require_once "bootstrap.php";

$postRepository = $entityManager->getRepository('Post');
$post = $postRepository->find(1);

$comment = new Comment($post);
$comment->setBody('My first comment!');

// No cascade persist is necessary
$entityManager->persist($comment);
$entityManager->flush();

echo $comment->getPost()->getId();
echo PHP_EOL;
echo $comment->getId();
echo PHP_EOL;
