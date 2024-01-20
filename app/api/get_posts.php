<?php

// Create a posts Controller instance
require_once('app/controllers/post.php');
$postsController = new PostsController();
$posts = $postsController->getPublicLatest();

$posts_arr = [];

foreach ($posts as $post) {
    $encoded_post = json_encode($post);
    array_push($posts_arr, $encoded_post);
}
echo json_encode($posts_arr);
?>