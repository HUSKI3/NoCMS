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
$posts = $postsController->getAllPosts($current_id);

require_once('app/common.php');
require_once('app/viewcontrollers/scribe/scribe.php');
echo 
<body>
    <div class="row" style="width: 99%;">
        build_navigation()
        .<main class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
            <div class="row">
                <h2> "Your Posts:" </h2>
                .<a class="btn btn-outline-secondary col col-md-2" role="button" href='/scribe/new_post'>"Create New"</a>
            </div>
            // Load cards here
            .<div class="row">
                foreach ($posts as $post) {
                    $edit_post = "/scribe/edit?id=" . $post->id;
                    $img = $post->cover;
                    echo 
                    <div class="card m-1" style="width: 18rem;">
                        <img class="card-img-top" src=$img alt="Card image cap">null</img>
                        .<div class="card-body">
                            <h5 class="card-title"> $post->title </h5>
                            .<p class="card-text">  substr($post->content, 0, 100) . "..." </p>
                            .<a href=$edit_post class="btn btn-primary">"Edit"</a>
                        </div>
                    </div>;
                }
            </div>
        </main>
    </div>
</body>;

echo $FOOTER;

?>