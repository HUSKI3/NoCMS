<?php

require_once('docs/common.php');

// 99% height and width is a hack fix for overflowing containers

title("Number Game | NoPHP");

echo 
<body class="bg-dark">
    <div class="row" style="width: 99%; height:99%">
        DocsCommon/build_navigation()
        .<main class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
            DocsCommon/build_topbar()
            .<div class="pt-5 d-flex justify-content-center contentcrop content">
                <div>
                    <h1> "Number Game" </h1>
                    .<p> nl2br(`
                    The best way to learn NoPHP is by writing a simple game. In this project we will cover
                    how you can use built-in functions from PHP as well as new functions from NoPHP. 

                    `)
                    </p>

                    .<h5> "Creating a project" </h5>
                    .<p> nl2br(
                    `Before we write any code, you must create a new project. The fastest and easiest way to
                    do this is to use the new project command:
                    `)
                    </p>
                    .<pre>
                        <code style="text-align: start !important;">
                            htmlspecialchars(`$ python -m nophp -n numbergame`)
                        </code>
                    </pre>
                    .?</br> // Split for clarity

                    .<h5> "Writing our game UI and Logic" </h5>
                    .<p> nl2br(
                        `The premise of the game is simple, try to guess a number from 1 to 10. The game will
                        tell you if the guess is too low or too high, otherwise you win! This will done by using
                        a form and handling POST and GET requests.

                        Let's start off with our HTML Segment first.
                        `)
                    </p>
                    .<pre>
                        <code style="text-align: start !important;">
                            htmlspecialchars(
`echo 
<body>
    <h1> "Guessing Game" </h1>
    .<form method="post">
        <label for="guess"> "Enter your guess (1-10):" </label>
        .<input type="number" id="guess" name="guess" min="1" max="10" required=true> null </input>
        .<button type="submit"> "Submit Guess" </button>
    </form>
</body>;
`)
                        </code>
                    </pre>

                    .<p> nl2br(
                        `As mentioned prior, you must concatinate multiple HTML Segments for them to 
                        function correctly. For example here inside the body tag, we append the form
                        tag to it. While inside the form we append the label, input and button tags.
                        Another thing to note is that a single opening tag is dissalowed, therfore you
                        must populate the tag with a null (Shown in the input tag).

                        This is should be enough for this game. Now that we are done with the graphics,
                        let's add the logic! Here's the run down:
                        - Create a session
                        - Store a random number from 1 to 10 in the session if it's not already set
                        - Check if the request is a POST and display a result, loss or win

                        Let's start with the session. To create a session all you need to do is
                        call the session_start() function. This will allow us to utilize the $_SESSION object.
                        Which we will query for a target number that the player must guess. This will be done
                        via a empty() function that returns true if the $_SESSION['target'] is not set. We
                        can then populate it via the rand(1, 10) function. This will assign a random number
                        from 1 to 10 to the target stored inside the session. Remember, the $_SESSION object
                        retains it's values even after a reload.
                        `)
                    </p>
                    .<pre>
                        <code style="text-align: start !important;">
                            htmlspecialchars(
`
session_start();

if (empty($_SESSION['target'])) {
    $_SESSION['target'] = rand(1,10);
}

// Body goes here
`)
                        </code>
                    </pre>
                    .<p> nl2br(
                        `Now that we have a target, we need to check if the user's guess is correct. The guess
                        is stored in $_SERVER['form']['guess']. Before we access that, let's first check if 
                        thre reuest is a POST, this can be done via $_SERVER['METHOD'], which will contain a 
                        capitalized method name; POST, GET and etc. For this we will be using a simple if 
                        statement embedded in an HTML Segment.
                        `)
                    </p>
                    .<pre>
                        <code style="text-align: start !important;">
                            htmlspecialchars(
`
...
<h1> "Guessing Game" </h1>
.<p>
if ($_SERVER['METHOD'] == 'POST') {
    $guess = $_SERVER['form']['guess'];
    $target = $_SESSION['target'];
} 
</p>
...
`)
                        </code>
                    </pre>
                    .<p> nl2br(
                        `From here we can write the game logic! As mentrioned prior, if the guess is too low,
                        we display a message to the user, same goes for the too high and a win outcome.
                        
                        Let's add these to the if statement:
                        `)
                    </p>
                    .<pre>
                        <code style="text-align: start !important;">
                            htmlspecialchars(
`
...
<h1> "Guessing Game" </h1>
.<p>
if ($_SERVER['METHOD'] == 'POST') {
    $guess = $_SERVER['form']['guess'];
    $target = $_SESSION['target'];
    if ($guess == $target) {
        echo "Congratz! Try guessing another one!";
        $_SESSION['target'] = null; // similar to unset
    } else {
        if ($guess < $target) { echo "Try a little higher!"}
        else { echo "Try a little lower!"}
    }
}
</p>
...
`)
                        </code>
                    </pre>
                    .<p> nl2br(
                        `
                        And we are done!

                        This is but a simple demo of what NoPHP is capable of doing. For more advanced usage
                        you can check the `) . <a href="https://github.com/HUSKI3/NoCMS"> "NoCMS Project" </a> .
                        nl2br(` That project showcases the other features such as the database, encryption and
                        JSON serialization. 
                        
                        Below you can find the entire example for the game:`)
                    </p>
                    .<pre>
                        <code style="text-align: start !important;">
                            htmlspecialchars(
`
namespace NumberGame;

session_start();

if (empty($_SESSION['target'])) {
    $_SESSION['target'] = rand(1,10);
}

echo 
<body>
    <h1> "Guessing Game" </h1>
    .<p>
    // We can embed things like "if" and "foreach"
    if ($_SERVER['METHOD'] == 'POST') {
        $guess = $_SERVER['form']['guess'];
        $target = $_SESSION['target'];
        if ($guess == $target) {
            echo "Congratz! Try guessing another one!";
            $_SESSION['target'] = null; // similar to unset
        } else {
            if ($guess < $target) { echo "Try a little higher!"}
            else { echo "Try a little lower!"}
        }
    } 
    </p>
    .<form method="post">
    <label for="guess"> "Enter your guess (1-10):" </label>
        .<input type="number" id="guess" name="guess" min="1" max="10" required=true> null </input>
        .<button type="submit"> "Submit Guess" </button>
    </form>
</body>;
`)
                        </code>
                    </pre>
                </div>
            </div>
        </main>
    </div>
</body>;

?>