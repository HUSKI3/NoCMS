<?php
namespace App;

require_once('app/common.php');
session_start();

// Create a posts Controller instance
require_once('app/controllers/post.php');
$postsController = new PostsController();
$posts = $postsController->getPublicLatest();

// Create a user Controller instance
require_once('app/controllers/user.php');
$usersController = new UserController();

echo 
<body class=$BODY_PADDING>
  // Use a shared function to center the element
  Common/center(
    <div class="col">
      <h2> "Our communities latest posts:" </h2>
      .<div class="col flex-nowrap overflow-auto">
        foreach ($posts as $post) {
          $read_post = "/others/manuscript?id=" . $post->id;
          $img = $post->cover;
          $author = $usersController->getByID($post->author);
          $author_link = "/writer?id=" . $author->id;
          echo 
          <div class="card m-1">
              <img class="card-img-top" style="height: 20rem; object-fit: cover;" src=$img alt="Card image cap">null</img>
              .<div class="card-body">
                  <h2 class="card-title"> $post->title </h2>
                  .<p class="card-text">  substr($post->content, 0, 200) . "..." </p>
                  .<p class="card-text"> 
                    "Written by: " . 
                    <a href=$author_link> $author->name </a>
                    . <p> " at " . $post->datetime </p>
                  </p>
                  .<a href=$read_post class="btn btn-primary">"Read"</a>
              </div>
          </div> . ?</br>;
        }
      </div>
    </div>,
    true
  )
</body>;

?>