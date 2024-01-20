<?php

namespace DocsCommon;
// Constant values
$bootstrap = `
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/styles/default.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/highlight.min.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<!-- Select PHP and add styling -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/languages/php.min.js"></script>
<script>hljs.highlightAll();</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/dompurify/3.0.8/purify.min.js" integrity="sha512-5g2Nj3mqLOgClHi20oat1COW7jWvf7SyqnvwWUsMDwhjHeqeTl0C+uzjucLweruQxHbhDwiPLXlm8HBO0011pA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link
rel="stylesheet"
href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.15.6/styles/atom-one-light.min.css"
media="screen"
/>
<link
rel="stylesheet"
href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.15.6/styles/atom-one-dark.min.css"
media="screen and (prefers-color-scheme: dark)"
/>
`;
$CSS = `
.crop {
    margin: 0 auto;
    padding: 10px;
    position: relative;
}
.content {
  overflow-y: scroll;
}
.contentcrop {
  height: 95vh;
}
`;

$BODY_PADDING = "md-4";
$HEAD = 
<head> 
    $bootstrap 
    .<style> $CSS </style> 
</head>;

$FOOTER = 
<footer class="fixed-bottom my-4">
    <ul class="nav justify-content-center border-bottom pb-3 mb-3">
        <li class="nav-item"><a href="#" class="nav-link px-2 text-muted"> "Home" </a></li>
        .<li class="nav-item"><a href="#" class="nav-link px-2 text-muted"> "Features" </a></li>
        .<li class="nav-item"><a href="#" class="nav-link px-2 text-muted"> "Pricing" </a></li>
        .<li class="nav-item"><a href="#" class="nav-link px-2 text-muted"> "FAQs" </a></li>
        .<li class="nav-item"><a href="#" class="nav-link px-2 text-muted"> "About" </a></li>
    </ul>
    .<p class="text-center text-muted"> "© 2023 ByteFor" </p>
    .<p class="text-center text-muted"> "Built with ❤️ and NoPHP" </p>
</footer>;


// Center an element
function center($el, $text_align) 
{
    if ($text_align == true) {
        $CLASSES = "container text-center mt-5";
    } else {
        $CLASSES = "container mt-5";
    }
    return 
        <div class=$CLASSES>
            <div class="col">
                echo $el
            </div>
        </div>;
} 


// TODO: Generate this automatically?
function build_navigation(){
  return 
  <nav class="col-md-2 d-none sidebar bg-body-tertiary h-100 d-md-block">
    <div class="sidebar-sticky p-3">
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link active fs-6" href="/docs">
            "The NoPHP Programming Language"
          </a>
        </li>
        .<li class="nav-item">
          <a class="nav-link" href="/docs/foreword">
            "Foreword"
          </a>
        </li>
        .<li class="nav-item">
          <a class="nav-link" href="/docs/introduction">
            "Introduction"
          </a>
        </li>
        .<li class="nav-item">
          <a class="nav-link" href="/docs/getting-started">
            "Getting Started"
          </a>
        </li>
        .<ul>
          <li>
            <a class="nav-link" href="/docs/spindle">
              "Spindle"
            </a>
          </li>
          .<li>
            <a class="nav-link" href="/docs/hello-world">
              "Hello World"
            </a>
          </li>
          .<li>
            <a class="nav-link" href="/docs/number-game">
              "Number Game"
            </a>
          </li>
        </ul>
      </ul>
    </div>
  </nav>;
}

function build_topbar() {
  return <div class="row border-bottom">
            <div class="container text-center">
                <div class="row align-items-start">
                  <button class="col navbar-toggler" type="button" onclick="doSidebar();">
                    <span class="navbar-toggler-icon">null</span>
                  </button>
                  .<div class="col">
                    "The NoPHP Programming Language (" . nophp_version() . ")"
                  </div>
                  .<div class="col">
                    "Edit"
                  </div>
                </div>
            </div>
            .<script>
            `function doSidebar() {
              var sidebar = document.querySelector('.sidebar');
              sidebar.classList.toggle('collapse');
              sidebar.classList.toggle('d-md-block');
              console.log(sidebar.classList);
            }`
            </script>
          </div>;
}

function title($title) {
  echo <title> $title </title>;
}

// For automatic dark mode
echo <html data-bs-theme="dark">;

// Head
echo $HEAD;


?>