<?php

namespace Common;
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
`;
$CSS = `
.crop {
    margin: 0 auto;
    padding: 10px;
    position: relative;
}
`;

$BODY_PADDING = "md-4";
$HEAD = 
<head> 
    $bootstrap 
    .<style> $CSS </style> 
</head>;

session_start();
if ($_SESSION['current']['name'] == null) {
    $NAVBAR_ENTRIES = [
        ["Latest", "/manuscripts"],
        ["Login", "/login"],
        ["Register", "/register"]
    ];
} else {
    $NAVBAR_ENTRIES = [
        ["Latest", "/manuscripts"],
        ["Scribe", "/scribe"],
        ["Logout", "/logout"]
    ];
}

$NAVBAR = 
<nav class="navbar navbar-expand-lg p-2 navbar-dark bg-dark justify-content-between">
    <a class="navbar-brand" href="/"> "NoCMS" </a>
    .<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon">null</span>
    </button>
    .<div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav mr-auto">
        // Go over the present entries and append them
        foreach ($NAVBAR_ENTRIES as $value) {
            echo <li class="nav-item"><a class="nav-link" href=$value[1]> $value[0] </a></li>
        }
      </ul>
    </div>
</nav>;
$FOOTER = 
<footer class="fixed-bottom my-4">
    <ul class="nav justify-content-center border-bottom pb-3 mb-3">
        <li class="nav-item"><a href="/" class="nav-link px-2 text-muted"> "Home" </a></li>
        .<li class="nav-item"><a href="/scribe" class="nav-link px-2 text-muted"> "Scribe" </a></li>
        .<li class="nav-item"><a href="/api/docs" class="nav-link px-2 text-muted"> "API" </a></li>
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
            <div class="column">
                echo $el
            </div>
        </div>;
} 

// For automatic dark mode
echo <html data-bs-theme="dark">;

// Head
echo $HEAD;

// Header
echo 
<header>
    // Navbar
    $NAVBAR
</header>;
?>