<?php


session_start();

if ($_SERVER['METHOD'] == 'GET') {
    ?die;
} 
if ($_SERVER['METHOD'] == 'POST') {
    // Create a posts Repository instance
    require_once('app/controllers/post.php');
    $postsController = new PostsController();

    // $current_id = $_SESSION['current']['id'];
    $id = $_SERVER["JSON"]["id"];
    $title = $_SERVER["JSON"]["title"];
    $content = $_SERVER["JSON"]["content"];
    // ($id, $userid, $title, $content)
    // Not using objects because the overhead is high...
    $postsController->savePost($id, $_SESSION['current']['id'], $title, $content);
}

?>