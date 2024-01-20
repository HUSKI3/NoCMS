<?php

$id = $_SERVER['args']['id'];

// Create a posts Controller instance
require_once('app/controllers/post.php');
$postsController = new PostsController();
$post = $postsController->getPostPublic($id);

if ($post == null) {
    echo json_encode(
        [
            "error" => "Invalid post"
        ]
    );
} else {
    echo json_encode($post);
}
?>