<?php
ini_set('session.cookie_httponly', true);

session_start ();

if (isset($_SESSION['userip']) === false){

    #here we store the IP into the session 'userip'
    $_SESSION['userip'] = $_SERVER['REMOTE_ADDR'];
}

if ($_SESSION['userip'] !== $_SERVER['REMOTE_ADDR']){
    #if it is not the same, we just remove all session variables
    #this way the attacker will have no session
    session_unset();
    session_destroy();

}
