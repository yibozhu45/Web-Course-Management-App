<?php
require('model/database.php');
require('model/student_db.php');

    if(session_id() === null)
    {
        $lifetime = 60 * 60 * 24 * 14;
        session_set_cookie_params($lifetime, '/');
    }
    
session_start();

$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if($action == NULL)
    {
        if (isset($_SESSION['text']))
        {
            $action = 'display_Home';
        }
        else
        {
            $action = 'display_signIn';
        }
    }
}
if ($action == 'display_signIn')
{
    include('sign_in_manager/sign_in.php');
}
else if($action == 'sign_in')
{
    $text = filter_input(INPUT_POST, 'text');
    $_SESSION['text'] = $text;
    $password = filter_input(INPUT_POST, 'password');
    $_SESSION['password'] = $password;
    if(preg_match('/[^a-zA-Z\d]/', $text))
    {
        $email = $text;
        $result = check_email($email);
        if(count($result) == 0)
        {
            $error = "Email is not exist, please check your input or create an account";
            include('errors/error.php');
        }
        else
        {
            $result_p = check_password($password);
            if(count($result_p) == 0)
            {
                $error = "Password is incorrect! Please try again!";
                include('errors/error.php');
            }
            else
            {
                $option = "email";
                include('Home.php');
            }
        }
    }
 else {
     $userid = $text;
     $result = check_id($userid);
     
        if(count($result) == 0)
        {
            $error = "User ID is not exist, please check your input or create an account";
            include('errors/error.php');
        }
        else
        {
            $result_p = check_password($password);
            if(count($result_p) == 0)
            {
                $error = "Password is incorrect! Please try again!";
                include('../errors/error.php');
            }
            else {
                $option = "userid";
                include('Home.php');
            }
        }
     }
}
else if($action == 'display_Home')
{
    include('sign_in_manager/sign_in.php');
}
else if($action == 'sign_out')
{
    session_destroy();
    include('sign_in_manager/sign_in.php');
}
?>

