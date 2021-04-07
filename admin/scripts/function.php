<?php

function redirect_to($location=null) {
  if($location != null) {
    header('Location: '.$location);
    exit;
  }
}

function sendNewUserEmail($email, $username, $name, $password)
{
    // Link to login allowing both https and http
    $link_to_login = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]".ROOT_PATH."/admin/admin_createuser.php";

    // email subject and message
    $email_subject = 'New Account Created - LRG';
    $email_message_template = "
Hello %s,

Your account has been created successfully. To log in please visit:
%s

To log in please use the following information:

Username: %s
Password: %s

Sincerly, 
The London Referee Group
";

    // Prepare mesaage
    $email_message = sprintf($email_message_template, $name, $link_to_login, $username, $password);
    // Email headers
    $email_headers = array(
  'From'=>'no-reply@londonrefereesgroup.com',
);
    // return result of email
    return mail($email, $email_subject, $email_message, $email_headers);
}


function generatePassword()
{
    // Define available characters and init password
    $chars = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
    $password = array();
  
    // Charlength of possible options
    $charLength = strlen($chars) - 1;
    $passLength = 10;
    $i = 0;

    // Loop through the $passLength and add a random letter from $char
    for ($i; $i < $passLength ; $i++) {
        $ranInt = rand(0, $charLength);
        $password[] = $chars[$ranInt];
    }
    // Turn array to string
    $pass = implode($password);

    // Return password as string.
    return $pass;
}