<?php
namespace Login;
require_once("app/repositories/users.php");
require_once("app/controllers/user.php");

// TODO: Functions "final" body doent get cleaned, this should be fixed as the error is horendous for uh things
session_start();

// Alternate by checking if the request was post or get
if ($_SERVER['METHOD'] == 'GET') {
    require_once('app/common.php');
    echo 
    <body class=$BODY_PADDING>
        Common/center(
            <div class="text-left">
            <form action="login" method="post">
                <div class="form-group">
                  <label for="emailInput">"Email address"</label>
                  .<input name="email" type="email" class="form-control" id="emailInput" aria-describedby="emailHelp" placeholder="Enter email">null</input>
                  .<small id="emailHelp" class="form-text text-muted" style="color: #ff5858 !important;"> $_SESSION["events"]["user_error"] </small>
                </div>
                .<div class="form-group">
                  <label for="passwordInput">"Password"</label>
                  .<input name="password" type="password" class="form-control" id="passwordInput" placeholder="Password">null</input>
                </div>
                .<button type="submit" class="btn btn-primary">"Login"</button>
            </form>
            </div>,
            false
        )
    </body>;
    echo $FOOTER;    
    // Reset events
    $_SESSION['events'] = null;
} 
// TODO: ELSE IF is broken
if ($_SERVER['METHOD'] == 'POST') {

    // Try to login
    $userController = new UserController();
    $user = $userController->login($_SERVER['form']['email']);

    // User doesnt exist
    if ($user->id == -1) {
      echo redirect('/login', ["user_error" => "Password is invalid or the user does not exist"]);
      ?die;
    }
    // Check if password is correct
    if( bcrypt_checkpw($_SERVER['form']['password'], $user->password) == false ) {
      echo redirect('/login', ["user_error" => "Password is invalid or the user does not exist"]);
      ?die;
    }

    $_SESSION['current'] = {};
    $_SESSION['current']['id'] = $user->id;
    $_SESSION['current']['email'] = $_SERVER["form"]["email"];

    // echo $user->name;

    $_SESSION['current']['name'] = $user->name;
    echo redirect('/');
    
} 


?>