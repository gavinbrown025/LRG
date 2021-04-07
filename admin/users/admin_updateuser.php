<?php

require_once '../../load.php';
confirm_logged_in(true);

if (isset($_POST['submit'])) {
    // Data of new user
    $data = array(
    'fname'=>trim($_POST['fname']),
    'username'=>trim($_POST['username']),
    'email'=>trim($_POST['email']),
    'id'=>trim($_POST['id']),
    'level'=>trim($_POST['level']),
  );

    // Return any errors and put in $message
    $message =  updateUser($data);
}


if (isset($_GET['id']) && isset($_GET['type'])) {
    $type = $_GET['type'];
    $id = $_GET['id'];
    if ($type == 'delete') {
        $message = deleteUser($id);
    } elseif ($type == 'passwordreset') {
        $message = passwordReset($id);
    } elseif ($type == 'update') {
        $user = getUsersById($id);
    } else {
        $message = 'Not a valid type';
    }
} elseif (!isset($_POST['submit'])) {
    $message = 'Not a valid item';
    // redirect_to('admin_users.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Panel</title>
  <link rel="stylesheet" href="../../css/style.css">
</head>
<body> <!-- Header -->
<header>
    <?php include_once '../../includes/nav.php' ?>
    <?php include_once '../templates/admin_header.php' ?>
  </header>
  <div class="admin-page">
  <h1>Update User</h1>
      <?php echo !empty($message)?'<div class="status">'.$message.'</div>':'' ?>

      <?php if (!empty($user)): ?>
        <form action="admin_updateuser.php" method="post">
        <input type="hidden" name="id" value="<?php echo $user['user_id']; ?>">
        <label for="fname">First Name</label>
        <input type="text" id="fname" name="fname" value="<?php echo $user['user_fname']; ?>">
        <br><br>
        <label for="username">Username</label>
        <input type="text" id="username" name="username" value="<?php echo $user['user_name']; ?>">
        <br><br>
        <label for="email">Email</label>
        <input type="email" id="email" name="email" value="<?php echo $user['user_email']; ?>">
        <br><br>
        <label for="level">User Level</label>
        <select name="level" id="level">
        <?php foreach (getUserLevelMap() as $value => $title):?>
          <option value="<?php echo $value; ?>" <?php echo ($user['user_level'] == $value) ? 'selected' : '' ?>><?php echo $title; ?></option>
        <?php endforeach?>
        </select>
        <br><br>
        <button type="submit" name="submit">Update User</button>
      </form>
      <?php endif ?>
        </div>
      
  <!-- Footer -->
  <?php include_once '../../includes/footer.php' ?>
</body> 
</html>