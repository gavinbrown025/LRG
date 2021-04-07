<div class="admin-header">
  <h4>Admin Panel</h4>
  <a class="options" href="<?php echo ROOT_PATH; ?>/admin/admin_panel.php">Panel</a>
  <a class="options" href="<?php echo ROOT_PATH; ?>/admin/content/admin_content.php">Content</a>
  <a class="options" href="<?php echo ROOT_PATH; ?>/admin/announcements/admin_announcements.php">Annoucements</a>
  <?php if(!empty($_SESSION['user_level'])):?>
    <a class="options" href="<?php echo ROOT_PATH; ?>/admin/users/admin_users.php">Users</a>
  <?php endif;  ?>
  <a class="options options-left" href="<?php echo ROOT_PATH; ?>/admin/admin_logout.php">Sign Out</a>
</div>
