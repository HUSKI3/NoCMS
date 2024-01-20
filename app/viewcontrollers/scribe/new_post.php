<?php
namespace ScribeApp;

session_start();

// Drop unauthenticated users
require_once('app/utils.php');
if (Utils/loggedin() == false) {
  echo redirect('/login');
  ?die;
}

$current_id = $_SESSION['current']['id'];

// Create a posts Repository instance
require_once('app/controllers/post.php');
$postsController = new PostsController();

require_once('app/common.php');
require_once('app/viewcontrollers/scribe/scribe.php');

$post = $postsController->createPost($current_id);

echo redirect('/scribe/edit?id=' . $post->id);
?>