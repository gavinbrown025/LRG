<?php
require_once '../../load.php';
confirm_logged_in(true);
$users = getUsers();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../../css/style.css">
  <title>Admin Users</title>
</head>
<body>
<header>
    <?php include_once '../../includes/nav.php' ?>
    <?php include_once '../templates/admin_header.php' ?>
  </header>
  

  <main>
    <div class="admin-page">
      <div class="sub-nav admin_section">
        <h1>Users</h1>
        <a href="admin_createuser.php" class="link">Create User</a>
      </div>
      <table>
        <tr>
          <th>Name</th>
          <th>Username</th>
          <th>Email</th>
          <th>User Level</th>
          <th>Actions</th>
        </tr>
        <?php 
        // Checks if the last user is about to be delted then hide button to delete user. 
        if (count($users) <= 1) {
          $not_last_user = false;
        } else {
          $not_last_user = true;
        }

        foreach ($users as $user):?>
          <tr>
            <td><?php echo $user['user_fname']; ?></td>
            <td><?php echo $user['user_name']; ?></td>
            <td><?php echo $user['user_email']; ?></td>
            <td><?php 
            // Display the proper name for user level
            $user_level_map = getUserLevelMap();
            $level = $user['user_level'];
            echo $user_level_map[$level]; 
            ?></td>
            <td>
              <a href="admin_updateuser.php?id=<?php echo $user['user_id']; ?>&type=passwordreset">Reset Password</a>
              <a href="admin_updateuser.php?id=<?php echo $user['user_id']; ?>&type=update">Update</a>
              <?php if ($not_last_user): ?>
                <a href="admin_updateuser.php?id=<?php echo $user['user_id']; ?>&type=delete">Delete</a>
              <?php endif ?>
            </td>
          </tr>
        <?php endforeach?>
      </table>
    </div>
  </main>
  <?php include_once '../../includes/footer.php' ?>
</body>
</html>