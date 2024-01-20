<?php

session_start();

if ($_SERVER['METHOD'] == 'GET') {
    ?die;
} 
if ($_SERVER['METHOD'] == 'POST') {
    // Me: I know this is a dumb approach, it's 5AM and I cant think of a way to fix stuff in the interpreter......
    // Me (5 days later): I don't even remember why this doesnt work now...
    // Me (7 days later): Whats the issue here?????
    // Me (Deadline is tomorrow): I still don't remember the issue, it's possible that it was fixed earlier
    //                            I think it was the else if thing, but not sure. Case statements would be cool
    // Create a posts Repository instance
    require_once('app/controllers/post.php');
    $postsController = new PostsController();

    // $current_id = $_SESSION['current']['id'];
    $id = $_SERVER["JSON"]["id"];

    $postsController->changevisPost($id, $_SESSION['current']['id']);
}

?>