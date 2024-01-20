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
            <div class="jumbotron">
              // <img style="height: 5rem;" src="files/coolio.png">null</img>
              <h1 class="display-4"> <b> $_SESSION['current']['name'] </b> . " Say Hello to " . <b> "NoCMS" </b> </h1>
              .<p class="lead"> "An easy to use CMS system for writing blogs and more" </p>
              .<p class="font-weight-bold"> "Hello Wim! You can find documentation for NoPHP over at " . <a href="/docs"> "NoPHP Docs" </a> </p>
              .?</hr class="my-4">
              //   .<p> "Start Now" </p>
              .<p class="lead">
                <a class="btn btn-primary btn-lg" href="/scribe" role="button">"Start Now"</a>
              </p>
              .?</br>
              .<h2> "Our communities latest posts:" </h2>
              .<div class="row flex-nowrap overflow-auto">
                foreach ($posts as $post) {
                  $read_post = "/others/manuscript?id=" . $post->id;
                  $img = $post->cover;
                  $author = $usersController->getByID($post->author);
                  $author_link = "/writer?id=" . $author->id;
                  echo 
                  <div class="card m-1" style="width: 18rem;">
                      <img class="card-img-top" src=$img alt="Card image cap">null</img>
                      .<div class="card-body">
                          <h5 class="card-title"> $post->title </h5>
                          // .<p class="card-text">  substr($post->content, 0, 80) . "..." </p>
                          .<p class="card-text"> 
                            "Written by: " . 
                            <a href=$author_link> $author->name </a>
                          </p>
                          .<a href=$read_post class="btn btn-primary">"Read"</a>
                      </div>
                  </div>;
                }
              </div>
            </div>,
            true
    )
</body>;

echo $FOOTER;

// Move this to onstart.php or app.php later
$posts_sql = `
CREATE TABLE IF NOT EXISTS blog_posts (
  blogpostid INTEGER PRIMARY KEY AUTOINCREMENT,
  author INTEGER,
  coverimage TEXT,
  title TEXT,
  content TEXT,
  visibility TEXT DEFAULT 'private',
  posted_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (author) REFERENCES user(id)
);
`;

$users_sql = `
CREATE TABLE IF NOT EXISTS user (
  id INTEGER PRIMARY KEY AUTOINCREMENT,
  username TEXT NOT NULL UNIQUE,
  name TEXT NOT NULL,
  email TEXT NOT NULL UNIQUE,
  password TEXT NOT NULL
);`;
$conn = sql_connect("db.sql");
sql_query($conn, $posts_sql);
sql_query($conn, $users_sql);

// susane@noreply.com
// suspass

?>