<?php
namespace Editor;
require_once('app/utils.php');

// Drop unauthenticated users
if (Utils/loggedin() == false) {
  echo redirect('/login');
  ?die;
}

session_start();

$userid = $_SESSION['current']['id'];

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
  }

  #preview {
    overflow-y: hidden;
    outline: 2px grey solid;
  }
  </style>`;

require_once('app/common.php');
require_once('app/viewcontrollers/scribe/scribe.php');

// Create a posts Repository instance
$post_id = $_SERVER['args']['id'];
require_once('app/controllers/post.php');
$postsController = new PostsController();
$post = $postsController->getPost($post_id, $userid);
if ($post == null) {
    echo 
    <h1>"404 Post not found"</h1>;
    ?die;
}
$view_post = "/others/manuscript?id=" . $post->id;
// This is for properties
$title = $post->title;

echo 
<body>
    <div class="row" style="width: 99%;">
        build_navigation()
        .<main id="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
            <div class="row">
                <div class="col">
                    <h2 class="col "> 
                        "Editing " . "'" . <span id="title"> $post->title </span> . "'"
                        . " (" . <b id="visibility">  $post->visibility </b> . ")" 

                    </h2>

                .<button type="button" class="col btn btn-info rounded-circle" data-toggle="modal" data-target="#helpModal">
                    "?"
                </button>
                </div>
                .<a class="btn btn-outline-secondary col col-md-1" onclick="save()" role="button">"Save Changes"</a>
                .? </br>
                .<a class="btn btn-outline-secondary col col-md-1" data-toggle="modal" data-target="#exampleModal" role="button">"Post Properties"</a>
                .? </br>
                .<a class="btn btn-outline-secondary col col-md-1" onclick="toggle_vis()" role="button">"Toggle Visibility"</a>
                .? </br>
                .<a class="btn btn-outline-danger col col-md-1" onclick="delete_post()" role="button">"Delete"</a>
                .? </br>
                .<a class="btn btn-outline-secondary col col-md-1" href=$view_post role="button">"View Public"</a>
            </div>
            .?</br>
            // Load editor here
            // TODO: Fix injection issues (XSS)
            .<div class="row overflow-auto">
                <div class="col" id="editor" contenteditable="true" oninput="updatePreview()"> nl2br($post->content) </div>
                .<div class="col" id="preview">null</div>
            </div>
            .<script type="text/javascript">
            // In NoPHP f` :$hi: ` is a formatted string, values are injected safely
            f`
            document.addEventListener('keydown', function(event) {
                if (event.ctrlKey && event.key === 's') {
                  save();
                  
                  event.preventDefault();
                }
              });
            function showToast() {
                // Create a new toast element
                var toast = document.createElement('div');
                toast.classList.add('toast', 'fixed-bottom', 'fixed-right', 'show', 'bg-success', 'text-white');
                toast.setAttribute('role', 'alert');
                toast.setAttribute('aria-live', 'assertive');
                toast.setAttribute('aria-atomic', 'true');
              
                // Create the toast header
                var header = document.createElement('div');
                header.classList.add('toast-header');
                var title = document.createElement('strong');
                title.classList.add('mr-auto');
                title.innerText = 'Your changes were successfully applied';
                // var closeButton = document.createElement('button');
                // closeButton.classList.add('ml-2', 'mb-1', 'close');
                // closeButton.setAttribute('type', 'button');
                // closeButton.setAttribute('data-dismiss', 'toast');
                // closeButton.setAttribute('aria-label', 'Close');
                // closeButton.innerHTML = '<span aria-hidden="true">&times;</span>';
              
                // Create the toast body
                var body = document.createElement('div');
                body.classList.add('toast-body');
                body.innerText = 'Post Saved!';
              
                // Assemble the toast
                header.appendChild(title);
                // header.appendChild(closeButton);
                toast.appendChild(header);
                toast.appendChild(body);
              
                // Append the toast to the body
                document.body.appendChild(toast);
              
                // Show the toast
                toast.classList.add('show');
              
                // Remove the toast after a delay (e.g., 5 seconds)
                setTimeout(function () {
                  toast.classList.remove('show');
                  setTimeout(function () {
                    document.body.removeChild(toast);
                  }, 300);
                }, 5000);
              }
              
                function updatePreview() {
                    const editorContent = document.getElementById('editor').innerText;
                    const previewElement = document.getElementById('preview');
                    const markdownHTML = DOMPurify.sanitize(marked.parse(editorContent)); // Sanitize, prevents JS injection
                    previewElement.innerHTML = markdownHTML;
                }
                function loadOnce() {
                    updatePreview();
                }
                function save() {
                    // Get post ID
                    var id = :$post_id:;
                    
                    // Build & send request
                    var xhr = new XMLHttpRequest();
                    xhr.open("POST", '/scribe/save', true);
                    xhr.setRequestHeader('Content-Type', 'application/json');
                    xhr.send(JSON.stringify({
                        id: id,
                        content: document.getElementById('editor').innerHTML,
                        title: document.getElementById('title').innerText
                    }));
                    showToast();
                }
                async function toggle_vis() {
                    // Get post ID
                    var id = :$post_id:;

                    var data = {
                      id: id
                    }
                    
                    // Build & send request
                    const resp = await fetch(
                      '/scribe/toggle_vis',
                      {
                        method: 'POST',
                        headers: {
                          "Content-Type": "application/json",
                        },
                        body: JSON.stringify(data)
                      }
                    );

                    if (resp.ok) {
                      document.getElementById('visibility').innerText = 
                        document.getElementById('visibility').innerText == 'private' ? 'public' : 'private';
                    } 
                    console.log(resp.ok);

                }

                function delete_post() {
                    if (confirm('Are you sure you want to delete this post?')) {
                        // Get post ID
                        var id = :$post_id:;
                        var userid = :$userid:;
                        
                        // Build & send request
                        var xhr = new XMLHttpRequest();
                        xhr.open("POST", '/scribe/delete', true);
                        xhr.setRequestHeader('Content-Type', 'application/json');
                        xhr.send(JSON.stringify({
                            id: id,
                            userid: userid
                        }));
                        xhr.onreadystatechange = function() { // listen for state changes
                            if (xhr.readyState == 4 && xhr.status == 200) { // when completed we can move away
                              window.location.href = "/scribe";
                            }
                          }
                        
                      }
                }
                async function change_title() {
                  var id = :$post_id:;
                  var userid = :$userid:;

                  var data = {
                    id: id,
                    userid: userid,
                    title: document.getElementById('titleChangeInput').value
                  }
                  
                  // Build & send request
                  const resp = await fetch(
                    '/scribe/change_title',
                    {
                      method: 'POST',
                      headers: {
                        "Content-Type": "application/json",
                      },
                      body: JSON.stringify(data)
                    }
                  );

                  if (resp.ok) {
                    document.getElementById('title').innerText = document.getElementById('titleChangeInput').value;
                  } 
                }

                window.onload = loadOnce;
            `
            </script>
        </main>
    </div>
    // TODO: Implement this
    .<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="titleModalTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="titleModalTitle">"Post Properties"</h5>
            </div>
            .<div class="modal-body">
              <p>"Title:"</p>
              .<input name="title" type="text" class="form-control" id="titleChangeInput" placeholder="Title">null</input>
            </div>
            .<div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">"Close"</button>
              .<button type="button" class="btn btn-primary" onclick="change_title()" data-dismiss="modal">"Save Changes"</button>
            </div>
          </div>
        </div>
    </div>
    .<div class="modal fade" id="helpModal" tabindex="-1" role="dialog" aria-labelledby="helpModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="helpModalLabel">"Help"</h5>
            </div>
            .<div class="modal-body">
              <p>
              "Welcome to the Scribe editor."
              </p>
              .<p>
              "Scribe supports Markdown syntax as well as some HTML."
              </p>
              .<p>
              "You can save the page by pressing CTRL+S"
              </p>
              .<p>
              "You can modify the post title, hit tracking and more at 'Post Properties'"
              </p>
            </div>
            .<div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">"Close"</button>
            </div>
          </div>
        </div>  
    </div>
</body>;

// No footer in the editor

?>
