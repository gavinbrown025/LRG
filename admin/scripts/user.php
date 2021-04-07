<?php

function getUserLevelMap()
{
    return array(
        '0'=>'Content Editor',
        '1'=>'Admin'
    );
}


function createUser($user_data)
{
    $pdo = Database::getInstance()->getConnection();

    // Get details for
    $name = $user_data['fname'];
    $email = $user_data['email'];
    $username = $user_data['username'];
    $level = $user_data['level'];

    // Set $user_level to empty if not included
    if (empty($level)) {
        $level = '0';
    }

    // Check if feilds are empty
    if (empty($name) || empty($email) || empty($username)) {
        return 'Please fill out all feilds';
    }

    // Check if user exists
    if (getUsersByUsername($username)) {
        return 'Please pick another username';
    }

    // Generate Random Password
    $password = generatePassword();

    // Create last login date as default
    $init_datetime = date_create()->format('Y-m-d H:i:s');

    // Hash password for security reasons
    // $hashedPass = password_hash($password, PASSWORD_DEFAULT);

    // Create query with values from form
    $create_user_query = 'INSERT INTO tbl_user(user_fname, user_name, user_pass, user_email, user_success_date, user_level)';
    $create_user_query .= ' VALUES(:fname, :name, :pass, :email, :success_date, :user_level)';

    // Prepare query
    $create_user_set = $pdo->prepare($create_user_query);
    $create_user_result = $create_user_set->execute(
        array(
      ':fname'=>$name,
      ':name'=>$username,
      ':pass'=>$password,
      ':email'=>$email,
      ':success_date'=>$init_datetime,
      ':user_level'=>$level,
    )
    );

    // If successful redirect else message
    if ($create_user_result) {
        $emailSuccess = sendNewUserEmail($email, $username, $name, $password);
        
        $message_template = '
        <strong>Account Created</strong>
        <p>Name: %s</p>
        <p>Username: %s</p>
        <p>Email: %s</p>
        <p>Password: %s</p>
        ';
        $return_message = sprintf($message_template, $name, $username, $email, $password);
        return $return_message;
    } else {
        return 'Error creating user!';
    }
}

function getUsers()
{
    $pdo = Database::getInstance()->getConnection();

    $get_users_query = 'SELECT user_id, user_fname, user_email, user_name, user_level FROM tbl_user';
    $users_set = $pdo->query($get_users_query);
    $users = $users_set->fetchAll(PDO::FETCH_ASSOC);

    return $users;
}

function getUsersById($id)
{
    $pdo = Database::getInstance()->getConnection();

    $get_user_query = 'SELECT * FROM tbl_user';
    $get_user_query .= ' WHERE user_id = :id';
    $user_operation = $pdo->prepare($get_user_query);
    $user_operation->execute(
        array(
      ':id'=>$id,
    )
    );

    return $user_operation->fetch(PDO::FETCH_ASSOC);;
}

function getUsersByUsername($username)
{
    $pdo = Database::getInstance()->getConnection();

    $get_user_query = 'SELECT * FROM tbl_user';
    $get_user_query .= ' WHERE user_name = :username';
    $user_operation = $pdo->prepare($get_user_query);
    $user_operation->execute(
        array(
      ':username'=>$username,
    )
    );

    return $user_operation->fetch(PDO::FETCH_ASSOC);;
}

function deleteUser($id)
{
    $pdo = Database::getInstance()->getConnection();

    $remove_user_query = 'DELETE FROM tbl_user WHERE user_id = :id';
    $remove_user = $pdo->prepare($remove_user_query);
    $remove_user_status = $remove_user->execute(
        array(
      ':id'=>$id,
    )
    );

    if ($remove_user_status) {
        redirect_to('admin_users.php');
    } else {
        return 'Unable to Delete User';
    }
}
function passwordReset($id)
{
    $pdo = Database::getInstance()->getConnection();

    // Generate Random Password
    $pass = generatePassword();

    // Hash password for security reasons
    $hashedPass = password_hash($pass, PASSWORD_DEFAULT);

    $password_query = 'UPDATE `tbl_user` SET `user_pass` = :pass WHERE `tbl_user`.`user_id` = :id; ';
    $password_reset = $pdo->prepare($password_query);
    $password_reset_status = $password_reset->execute(
        array(
      ':id'=>$id,
      ':pass'=>$hashedPass
    )
    );

    if ($password_reset_status) {
        return 'New password is '.$pass;
    } else {
        return 'Unable to Delete User';
    }
}



function updateUser($user_data)
{
    $pdo = Database::getInstance()->getConnection();

    // Get details
    $user_name = $user_data['fname'];
    $user_email = $user_data['email'];
    $user_username = $user_data['username'];
    $user_id = $user_data['id'];
    $user_level = $user_data['level'];

    // Set $user_level to empty if not included
    if (empty($user_level)) {
        $user_level = '0';
    }

    // Check if feilds are empty
    if (empty($user_name) || empty($user_email) || empty($user_username)) {
        return 'Please fill out all feilds';
    }

    $old_user = getUsersByUsername($user_username);

    // continue if user does not already exists
    if (!$old_user) {
        return 'User does not exist';
    }

    // Create query with values from form
    $create_user_query = 'UPDATE tbl_user SET user_fname = :fname, user_name = :name, user_email = :email, user_level = :level';
    $create_user_query .= ' WHERE user_id = :id';

    // Prepare query
    $create_user_set = $pdo->prepare($create_user_query);
    $create_user_result = $create_user_set->execute(
        array(
      ':fname'=>$user_name,
      ':name'=>$user_username,
      ':email'=>$user_email,
      ':id'=>$user_id,
      ':level'=>$user_level 
    )
    );

    // If successful redirect else message
    if ($create_user_result) {
        $emailSuccess = sendNewUserEmail($user_email, $user_username, $user_name, $old_user['user_pass']);
        if (!$emailSuccess) {
            return 'Error sending email!, User Created';
        }
        
        $message_template = '
        <strong>Account Updated</strong>
        <p>Name: %s</p>
        <p>Username: %s</p>
        <p>Email: %s</p>
        <p>Password: %s</p>
        ';
        $return_message = sprintf($message_template, $user_name, $user_username, $user_email, $old_user['user_pass']);
        return $return_message;
    } else {
        return 'Error updating user!';
    }
}
