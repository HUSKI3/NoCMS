<?php
namespace Editor;
require_once('app/utils.php');

session_start();

$current_id = $_SESSION['current']['id'];

// We also need to inject the markdown library
echo <script src="https://cdn.jsdelivr.net/npm/marked/marked.min.js">null</script>;
// And the css
echo `
<style>
#editor, #preview {
    float: left;
  }

  #editor {
    resize: vertical;
    opacity: 0; 
    position: absolute; 
    height:0px; 
    width:0px;
    overflow:hidden;
  }

  #preview {
    overflow-y: hidden;
  }
  </style>`;

require_once('app/common.php');
require_once('app/viewcontrollers/scribe/scribe.php');

// Create a posts Repository instance
$post_id = $_SERVER['args']['id'];
require_once('app/controllers/post.php');
$postsController = new PostsController();
$post = $postsController->getPostPublic($post_id);

if ($post == null) {
    echo <h1> "404 - No such post or the post hasn't been published" </h1>;
    ?die;
} 

// Create a user Repository instance
require_once('app/controllers/user.php');
$usersController = new UserController();
$author = $usersController->getByID($post->author);
$author_link = "/writer?id=" . $author->id;

echo 
<body>
    <div class="container mt-5">
        <div class="column">
            <div class="row">
                <h2 class="col "> 
                "Reading " . "'" . <span id="title"> $post->title </span> . "'" 
                . <i> " written by " . <a href=$author_link> $author->name </a> . <p> " at " . $post->datetime </p> </i>
                </h2>
            </div>
            // Load editor here
            // TODO: Fix injection issues (XSS)
            .<div class="row overflow-auto">
                <div class="col" id="preview">null</div>
                .<div id="editor" contenteditable="false"> nl2br($post->content) </div>
            </div>
            .<script type="text/javascript">
            `
                function updatePreview() {
                    const editorContent = document.getElementById('editor').innerText;
                    const previewElement = document.getElementById('preview');
                    const markdownHTML = DOMPurify.sanitize(marked.parse(editorContent)); // Sanitize, prevents JS injection

                    previewElement.innerHTML = markdownHTML;
                }
                function loadOnce() {
                    updatePreview();
                }
            
                window.onload = loadOnce;
            `
            </script>
        </div>
    </div>
</body>;

?>
