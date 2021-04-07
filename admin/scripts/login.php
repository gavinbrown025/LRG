<?php

function login($username, $password, $ip)
{
    $pdo = Database::getInstance()->getConnection();

    // Get user
    $get_user_query = 'SELECT * FROM tbl_user WHERE user_name = :username';
    $user_set = $pdo->prepare($get_user_query);
    $user_set->execute(
        array(
      ':username'=>$username
    )
    );

    // If user is found, NOTE: they are not authenticated yet
    if ($found_user = $user_set->fetch(PDO::FETCH_ASSOC)) {


        // Check if found user is locked out
        if ($found_user['user_locked'] == 1) {
            return 'Account Locked';
        }

        // Set users ID
        $found_user_id = $found_user['user_id'];

        // check if hashed password is matches password user entered
        if ($password == $found_user['user_pass']) {
            
            // Sets session variables
            $_SESSION['user_id'] = $found_user_id;
            $_SESSION['user_name'] = $found_user['user_fname'];
            $_SESSION['user_level'] = $found_user['user_level'];
            $_SESSION['user_success_date'] = $found_user['user_success_date'];
            $_SESSION['user_total_logins'] = $found_user['user_total_logins'];

            // Create for mysql datetime column
            $login_datetime = date_create()->format('Y-m-d H:i:s');

            // Add one to total successful logins
            $total_logins = $found_user['user_total_logins'] + 1;

            // Reset attempts, update login time for next time, and update IP
            $update_user_query = 'UPDATE tbl_user SET user_ip = :user_ip, user_success_date = :date_time, user_total_logins = :total_logins, user_attempts=0 WHERE user_id=:user_id';
            $update_user_set = $pdo->prepare($update_user_query);
            $update_user_set->execute(
                array(
              ':user_ip'=>$ip,
              ':user_id'=>$found_user_id,
              ':date_time'=>$login_datetime,
              ':total_logins'=>$total_logins
            )
            );

            redirect_to('admin_panel.php');
        } else {
            // User password is wrong
            // 1. Add user failed attempt
            // 2. if attempt is above 3 then lock account
            // NOTE: Locked accounts can only be regained by changing database value of user_locked to "0"(false)
            $login_attempts = $found_user['user_attempts'];

            // Too many tries, lock account
            if ($login_attempts >= 2) {
                // set locked out
                $update_user_query = 'UPDATE tbl_user SET user_attempts = :user_attempts, user_locked = 1 WHERE user_id=:user_id';
                $update_user_set = $pdo->prepare($update_user_query);
                $update_user_set->execute(
                    array(
                      ':user_id'=>$found_user_id,
                      ':user_attempts'=>$login_attempts + 1,
                    )
                );
                // Tell them they are fully locked out for good.  
                return '3 Failed attempts. You have been locked out of this account, please contact admin to regain access';
            } else {

                // Update user attempts
                $update_user_query = 'UPDATE tbl_user SET user_attempts = :user_attempts WHERE user_id=:user_id';
                $update_user_set = $pdo->prepare($update_user_query);
                $update_user_set->execute(
                    array(
                      ':user_id'=>$found_user_id,
                      ':user_attempts'=>$login_attempts + 1
                    )
                );
                // Return message 
                return 'Username or Password Incorrect';
            }
        }
    } else {
        // No user found, return message
        return 'Username or Password Incorrect';
    }
}

function confirm_logged_in($requre_admin_level=false)
{
    if (!isset($_SESSION['user_id'])) {
        redirect_to(ROOT_PATH.'/admin/admin_login.php');
    }

    if (!empty($requre_admin_level) && empty($_SESSION['user_level'])) {
        redirect_to(ROOT_PATH.'/admin/admin_panel.php');
    }
}

function logout()
{
    session_destroy();

    redirect_to('./admin_login.php');
}
