<?php
require_once '../../load.php';
confirm_logged_in(true);


if (isset($_POST['submit'])) {

    // Data of new user
    $data = array(
    'id'=>trim($_POST['id']),
    'title'=>trim($_POST['title']),
    'body'=>trim($_POST['body'])
  );
    // Return any errors and put in $message
    $message =  updateAnnouncement($data);
} 

if (isset($_GET['type']) && isset($_GET['id'])) {
  if ($_GET['type'] == 'delete') {
    $message =  deleteAnnouncements($_GET['id']);
  } else if ($_GET['type'] == 'update') {
    $announcement = getAnnouncementById($_GET['id']);
  }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Create Annoucement</title>
  <link rel="stylesheet" href="../../css/style.css">
</head>
<body>  
<header>
    <?php include_once '../../includes/nav.php' ?>
    <?php include_once '../templates/admin_header.php' ?>
  </header>
  
  <main>
    <div class="admin-page">
      <h1>Create Annoucement</h1>
      <?php echo !empty($message)?'<div class="status">'.$message.'</div>':'' ?>
      
      <form action="admin_updateannouncement.php" method="post">
        <input type="hidden" name="id" value="<?php echo $announcement['id']; ?>" required>
        <label for="title">Title</label>
        <input type="text" id="title" name="title" value="<?php echo $announcement['title']; ?>" required>
        <br><br>
        <label for="body">Copy</label>
        <br><br>
        <textarea id="body" name="body" required><?php echo $announcement['body']; ?></textarea>
        <br><br>
        <button type="submit" name="submit">Update Annoucement</button>
      </form>
    </div>
  </main>
  <!-- Footer -->
  <?php include_once '../../includes/footer.php' ?>
</body>
</html>