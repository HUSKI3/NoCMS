<?php
namespace ScribeDeletePost;
session_start();

if ($_SERVER['METHOD'] == 'GET') {
    ?die;
} 
if ($_SERVER['METHOD'] == 'POST') {
    // Create a posts Repository instance
    require_once('app/controllers/post.php');
    $postsController = new PostsController();

    $userid = $_SESSION['current']['id'];
    $id = $_SERVER["JSON"]["id"];
    // Todo: fix functions requiring the same parameters names????????
    $postsController->deletePost($id, $userid);
    echo redirect("/scribe");
}

?>