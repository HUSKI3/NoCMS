<?php
namespace Register;
require_once("app/repositories/users.php");
require_once("app/controllers/user.php");

// TODO: Functions "final" body doent get cleaned, this should be fixed as the error is horendous for uh things
session_start();

// TODO: Add errors to register?

// Alternate by checking if the request was post or get
if ($_SERVER['METHOD'] == 'GET') {
    require_once('app/common.php');
    echo 
    <body class=$BODY_PADDING>
        Common/center(
            <div class="text-left">
            <form action="register" method="post">
                <div class="form-group">
                    <label for="nameInput">"Name"</label>
                    .<input name="name" type="text" class="form-control" id="nameInput" aria-describedby="nameHelp" placeholder="Enter name">null</input>
                    .<small id="nameHelp" class="form-text text-muted">"Your name will show up next to your posts"</small>
                    .?</br>
                    .<small id="nameHelp" class="form-text text-muted" style="color: #ff5858 !important;"> $_SESSION["events"]["name_error"] </small>
                </div>
                .?</br>
                .<div class="form-group">
                    <label for="usernameInput">"Username"</label>
                    .<input name="username" type="text" class="form-control" id="usernameInput" aria-describedby="usernameHelp" placeholder="Enter username">null</input>
                    .<small id="usernameHelp" class="form-text text-muted" style="color: #ff5858 !important;"> $_SESSION["events"]["username_error"] </small>
                </div>
                .?</br>
                .<div class="form-group">
                  <label for="emailInput">"Email address"</label>
                  .<input name="email" type="email" class="form-control" id="emailInput" aria-describedby="emailHelp" placeholder="Enter email">null</input>
                  .<small id="emailHelp" class="form-text text-muted">"We'll never share your email with anyone else."</small>
                  .?</br>
                  .<small id="emailHelp" class="form-text text-muted" style="color: #ff5858 !important;"> $_SESSION["events"]["email_error"] </small>
                  </div>
                .?</br>
                .<div class="form-group">
                  <label for="passwordInput">"Password"</label>
                  .<input name="password" type="password" class="form-control" id="passwordInput" placeholder="Password">null</input>
                  .<small id="passwordHelp" class="form-text text-muted" style="color: #ff5858 !important;"> $_SESSION["events"]["password_error"] </small>
                  </div>
                .?</br>
                .<div class="form-group">
                  <label for="passwordInput">"Verify Password"</label>
                  .<input name="vpassword" type="password" class="form-control" id="vpasswordInput" placeholder="Password">null</input>
                  .?</br>
                  .<small id="vpasswordHelp" class="form-text text-muted" style="color: #ff5858 !important;"> $_SESSION["events"]["vpassword_error"] </small>
                  </div>
                .?</br>
                .<button type="submit" class="btn btn-primary">"Submit"</button>
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

    
    // This is terrible, but I can't figure out how to implement
    // OR and AND rules in the parser...

    // Username is empty
    if ( empty($_SERVER['form']['username']) ) { 
        // We can denote an event by passing an 
        // assosiative array of strings (or more?) 
        // with the events to the redirect function
        // We display the error event below an input field 
        echo redirect('/register', ["username_error" => "Username can not be blank"]); 
        ?die;
    }
    // Email is empty
    if ( empty($_SERVER['form']['email']) ) {
        echo redirect('/register', ["email_error" => "Email can not be blank"]); 
        ?die;
    }
    // Password is empty
    if ( empty($_SERVER['form']['password']) ) {
        echo redirect('/register', ["password_error" => "Password can not be blank"]); 
        ?die;
    }
    // Name is empty
    if ( empty($_SERVER['form']['name']) ) { 
        echo redirect('/register', ["name_error" => "Name can not be blank"]); 
        ?die;
    }
    // Check if the password and verify password match
    if ($_SERVER['form']['password'] != $_SERVER['form']['vpassword']) {
        echo redirect('/register', ["vpassword_error" => "Passwords dont match"]); 
        echo redirect('/register');
        ?die;
    }

    // Hash the password
    $salt = bcrypt_gensalt(12);
    $hashed = bcrypt_hashpw($_SERVER['form']['password'], $salt);

    // Try to register
    $userController = new UserController();
    $user = $userController->register(
        $_SERVER['form']['email'], 
        $_SERVER['form']['name'], 
        $_SERVER['form']['username'], 
        $hashed
    );

    if ($user->id == -1) {
        echo redirect('/register');
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