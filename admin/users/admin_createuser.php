<?php
require_once '../../load.php';
confirm_logged_in(true);


if (isset($_POST['submit'])) {

    // Data of new user
    $data = array(
    'fname'=>trim($_POST['fname']),
    'username'=>trim($_POST['username']),
    'email'=>trim($_POST['email']),
    'level'=>trim($_POST['level'])
  );
    // Return any errors and put in $message
    $message =  createUser($data);
} 

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Create User</title>
  <link rel="stylesheet" href="../../css/style.css">
</head>
<body>  
<header>
    <?php include_once '../../includes/nav.php' ?>
    <?php include_once '../templates/admin_header.php' ?>
  </header>
  
  <main>
    <div class="admin-page">
      <h1>Create User</h1>
      <?php echo !empty($message)?'<div class="status">'.$message.'</div>':'' ?>
      
      <form action="admin_createuser.php" method="post">
        <label for="fname">First Name</label>
        <input type="text" id="fname" name="fname" value="" required>
        <br><br>
        <label for="username">Username</label>
        <input type="text" id="username" name="username" value="" required>
        <br><br>
        <label for="email">Email</label>
        <input type="email" id="email" name="email" value="" required>
        <br><br>
        <label for="level">User Level</label>
        <select name="level" id="level" required>
        <?php $array = getUserLevelMap();
        foreach ($array as $value => $title):?>
          <option value="<?php echo $value; ?>" <?php echo (reset($array) == $title) ? 'selected': ''; ?>><?php echo $title; ?></option>
        <?php endforeach?>
        </select>
        <br><br>
        <button type="submit" name="submit">Add User</button>
      </form>
    </div>
  </main>
  <!-- Footer -->
  <?php include_once '../../includes/footer.php' ?>
</body>
</html>