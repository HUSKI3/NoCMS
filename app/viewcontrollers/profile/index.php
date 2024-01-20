<?php
namespace ScribeUserPublic;

session_start();

$userid = $_SERVER['args']['id'];

if ($userid == null) {
    echo redirect("/");
    ?die;
}

// Create a posts Repository instance
require_once('app/controllers/post.php');
$postsController = new PostsController();
$posts = $postsController->getAllPublicPosts($userid);

// Create a user Repository instance
require_once('app/controllers/user.php');
$usersController = new UserController();
$author = $usersController->getByID($userid);

require_once('app/common.php');
require_once('app/viewcontrollers/scribe/scribe.php');
echo 
<body>
    <div class="row" style="width: 99%;">
        <main class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
            <h2> $author->name . "'s Posts:" </h2>
            // Load cards here
            .<div class="row flex-nowrap overflow-auto">
                foreach ($posts as $post) {
                    $read_post = "/others/manuscript?id=" . $post->id;
                    $img = $post->cover;
                    echo 
                    <div class="card m-1" style="width: 18rem;">
                        <img class="card-img-top" src=$img alt="Card image cap">null</img>
                        .<div class="card-body">
                            <h5 class="card-title"> $post->title </h5>
                            .<p class="card-text">  substr($post->content, 0, 100) . "..." </p>
                            .<a href=$read_post class="btn btn-primary">"Read"</a>
                        </div>
                    </div>;
                }
            </div>
        </main>
    </div>
</body>;

echo $FOOTER;

?>