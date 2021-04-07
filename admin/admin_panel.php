<?php
require_once '../load.php';
confirm_logged_in();
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Panel</title>
  <link rel="stylesheet" href="../css/style.css">
</head>
<body> <!-- Header -->
  <header>
    <?php include_once '../includes/nav.php' ?>
    <?php include_once './templates/admin_header.php' ?>
  </header>
  
  <main>
    
    <div class="admin-page">
      <h1>Admin Panel</h1>
      <h3>Your Level: <?php echo getUserLevelMap()[$_SESSION['user_level']]; ?></h3>
    </div>
  </main>
  <!-- Footer -->
  <?php include_once '../includes/footer.php' ?>
</body> 
</html>