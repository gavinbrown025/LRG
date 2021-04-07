<?php
require_once '../../load.php';
confirm_logged_in();

$annoucements;

$message = getAnnoucements($annoucements);


?>




<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Announcements</title>
  <link rel="stylesheet" href="../../css/style.css">
</head>
<body> <!-- Header -->
  <header>
    <?php include_once '../../includes/nav.php' ?>
    <?php include_once '../templates/admin_header.php' ?>
  </header>
  <main>
    <div class="admin-page">
      <div class="sub-nav">
        <h1>Admin Announcements</h1>
        <a href="admin_createannouncement.php" class="link">Create Announcement</a>
      </div>
      <?php echo !empty($message)?'<div class="status">'.$message.'</div>':'' ?>
      <table>
        <tr>
          <th>Title</th>
          <th>Body</th>
          <th>Date</th>
          <th>Actions</th>
        </tr>
      <?php foreach ($annoucements as $post):?>
          <tr>
            <td><?php echo $post['title']; ?></td>
            <td class="td_mw"><?php echo $post['body']; ?></td>
            <td><?php echo $post['date']; ?></td>
            <td>
              <a href="admin_updateannouncement.php?id=<?php echo $post['id']; ?>&type=delete">Delete</a>
              <a href="admin_updateannouncement.php?id=<?php echo $post['id']; ?>&type=update">Update</a>
            </td>
          </tr>
        <?php endforeach?>
      </table>
    </div>
    
  </main>
  <!-- Footer -->
  <?php include_once '../../includes/footer.php' ?>
</body> 
</html>