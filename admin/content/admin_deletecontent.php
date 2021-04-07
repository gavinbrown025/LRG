<?php 

require_once '../../load.php';
confirm_logged_in();

if ($_GET['id']) {
  deleteFile($_GET['id']);
  redirect_to('admin_content.php');
} else {
  redirect_to('admin_content.php');
}