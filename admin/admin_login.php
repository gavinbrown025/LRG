<?php
require_once '../load.php';

// Check if logged in
if (isset($_SESSION['user_id'])) {
  redirect_to('./admin_panel.php');
}

// Set ip
$ip = $_SERVER['REMOTE_ADDR'];

// If POST request with form request
if (isset($_POST['submit'])) {
  $username = trim($_POST['username']);
  $password = trim($_POST['password']);

  if (!empty($username) && !empty($password)) {
    $result = login($username, $password, $ip);
    $message = $result;
  } else {
    $message = 'Please fill out all required fields.';
  }

}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Login</title>
  <link rel="stylesheet" href="../css/style.css">
</head>
<body>
  <!-- Header -->
  <header>
    <?php include_once '../includes/nav.php' ?>
  <main>
    <section class='admin-page'>
      <h1>Admin Login</h1>
      <?php echo !empty($message)?'<div class="status">'.$message.'</div>':'' ?>
      <form action="admin_login.php" method="POST">
        <label for="username">Username:</label>
        <input id="username" type="text" name="username" value="">
        <br><br>
        <label for="password" type='password'>Pasword: </label>
        <input id="password" type="password" name="password">
        <br><br>
        <button type="submit" name="submit">Login</button>
      </form>
    </section>
  </main>


  <!-- Footer -->
  <?php include_once '../includes/footer.php' ?>
</body>
</html>