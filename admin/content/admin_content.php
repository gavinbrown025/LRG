<?php
require_once '../../load.php';
confirm_logged_in();

// Set original state of content to pass in as reference
$content = [];

// if it was a post request then upload file
if (isset($_POST["submit"])) {
    $message = uploadFile($_POST["caption"]);
}

// Replaces messages if an error occured. This is done in this way to prevent it overwriting the message of a post request
// Only if a error message exists then it will set the message variable
$contentStatus = getContent($content);
if ($contentStatus) {
  $message = $contentStatus;
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Content</title>
  <link rel="stylesheet" href="../../css/style.css">
</head>
<body>
  <header>
    <?php include_once '../../includes/nav.php' ?>
    <?php include_once '../templates/admin_header.php' ?>
  </header>
  
  <div class="admin-page">
    <section class="admin_section">
      <h1>Gallery Upload</h1>
      <?php echo !empty($message)?'<div class="status">'.$message.'</div>':'' ?>
      <form action="admin_content.php" method="post" enctype="multipart/form-data">
        <label for="fileToUpload">Select image to upload:</label>
        <input type="file" name="fileToUpload" id="fileToUpload" required>
        <br><br>
        <label for="caption">Caption:</label>
        <input type="text" name="caption" id="caption" required placeholder="Caption..">
        <br><br>
        <input type="submit" value="Upload File" name="submit">
      </form>
</section>
    <section class="admin_gallery admin_section">
      <!-- If content display content, else tell user to upload content -->
      <?php if (!empty($content)): ?>
        <?php foreach ($content as $item):?>
          <div>
            <div class="controls">
              <a href="admin_deletecontent.php?id=<?php echo $item['id']; ?>">Delete</a>
              <p><?php echo $item['name']; ?></p>
              <h4><?php echo $item['caption']; ?></h4>
              <a href="<?php echo ROOT_PATH ?>/content/<?php echo $item['path']; ?>" target="_BLANK">Link</a>
            </div>
            <img src="<?php echo ROOT_PATH ?>/content/<?php echo $item['path']; ?>"
            alt="<?php echo $item['name']; ?>">
            
          </div>
        <?php endforeach?>  
      <?php else: ?>
        <p>No content. Click upload file to upload content.</p>
      <?php endif ?>
    </section>
  </div>
  <!-- Footer -->
  <?php include_once '../../includes/footer.php' ?>
</body> 
</html>