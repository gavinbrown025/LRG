<?php 

function getAnnoucements(&$annoucements) {
  $pdo = Database::getInstance()->getConnection();

    $annoucements_query = 'SELECT * FROM tbl_announcements LIMIT 6';
    $annoucements_set = $pdo->query($annoucements_query);
    $annoucements = $annoucements_set->fetchAll(PDO::FETCH_ASSOC);
    if (empty($annoucements)) {
      return 'Unable to get annoucements';
    }
    return;
}

// can we do a see more button? for announcements

function createAnnoucements($data) {
  $pdo = Database::getInstance()->getConnection();

  $title = $data['title'];
  $body = $data['body'];


  $add_annoucement_query = 'INSERT INTO tbl_announcements (title, body)';
  $add_annoucement_query .= ' VALUES (:title, :body)';
  $annoucement_operation = $pdo->prepare($add_annoucement_query);
  $annoucement_operation->execute(
      array(
    ':title'=>$title,
    ':body'=>$body
  )
  );

  if ($annoucement_operation) {
    redirect_to('./admin_announcements.php');
  } else {
    return 'Error creating annoucement';
  }
}

function deleteAnnouncements($id) {

  $pdo = Database::getInstance()->getConnection();

  $remove_announcement_query = 'DELETE FROM tbl_announcements WHERE id = :id';
  $remove_announcement = $pdo->prepare($remove_announcement_query);
  $remove_announcement_status = $remove_announcement->execute(
      array(
    ':id'=>$id,
  )
  );

  if ($remove_announcement_status) {
      redirect_to('admin_announcements.php');
  } else {
      return 'Unable to Delete Announcement';
  }
}

function getAnnouncementById($id) {
  $pdo = Database::getInstance()->getConnection();

  $announcement_query = 'SELECT * FROM tbl_announcements WHERE id = :id';
  $announcement_operation = $pdo->prepare($announcement_query);
  $announcement_operation->execute(
      array(
    ':id'=>$id,
  )
  );
  $announcement = $announcement_operation->fetch(PDO::FETCH_ASSOC);
  return $announcement;
}




function updateAnnouncement($data) {
  $id = $data['id'];
  $title = $data['title'];
  $body = $data['body'];

  if (empty($id) || empty($title) || empty($body)) {
    return 'Error updating annoucement, please fill out all values';
  }

  $pdo = Database::getInstance()->getConnection();

  $announcement_query = 'UPDATE tbl_announcements SET title = :title, body = :body WHERE id = :id';
  $announcement_operation = $pdo->prepare($announcement_query);
  $announcement_operation->execute(
      array(
    ':id'=>$id,
    ':title'=>$title,
    ':body'=>$body
  )
  );

  if ($announcement_operation) {
    redirect_to('admin_announcements.php');
  } else {
    return 'Error updating annoucement';
  }
}