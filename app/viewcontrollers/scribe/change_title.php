<?php

session_start();

if ($_SERVER['METHOD'] == 'GET') {
    ?die;
} 
if ($_SERVER['METHOD'] == 'POST') {
    // Reusing code fom the toggle_vis.php 
    // Create a posts Repository instance
    require_once('app/controllers/post.php');
    $postsController = new PostsController();

    $userid = $_SESSION['current']['id'];
    $id = $_SERVER["JSON"]["id"];
    $title = $_SERVER["JSON"]["title"];
    $post = $postsController->getPost($id, $userid);

    echo $title;

    $postsController->savePost($id, $userid, $title, $post->content);

    $post = $postsController->getPost($id, $userid);

    echo $post->title;
}

?>