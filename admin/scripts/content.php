
<?php

function getContent(&$content)
{
    $pdo = Database::getInstance()->getConnection();

    // get files to database
    $get_content = 'SELECT * FROM tbl_content';
    $runQuery = $pdo->query($get_content);
    if ($runQuery) {
        $content = $runQuery-> fetchAll(PDO::FETCH_ASSOC);
    } else {
        return 'Error getting content';
    }
}

function deleteFile($id)
{
    $pdo = Database::getInstance()->getConnection();

    // get file to database
    $content_query = 'SELECT * FROM tbl_content WHERE id = :id';
    $content = $pdo->prepare($content_query);
    $content->execute(
        array(
      ':id'=>$id
      )
    );
    $content_item = $content->fetch(PDO::FETCH_ASSOC);


    unlink('../../content/'.$content_item['path']);


    // Add File to database
    $delete_content = 'DELETE FROM tbl_content WHERE id = :id';
    $deleted_operation = $pdo->prepare($delete_content);
    $deleted_operation->execute(
        array(
      ':id'=>$id
      )
    );
}

function uploadFile($caption)
{
    if(empty($caption)) {
        return 'Caption required.';
    }
    $path = "../../content/";
    $target_file = $path . basename($_FILES["fileToUpload"]["name"]);
    $status = true;

    $imageSize = getimagesize($_FILES["fileToUpload"]["tmp_name"]);

    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    // $contentType = '';



    // // Get mime type
    // $mime = mime_content_type($_FILES["fileToUpload"]["tmp_name"]);
    // // Is movie

    if ($imageSize == false) {
        return "Error: Only JPG, JPEG, PNG, GIF files are allowed.";
    }

    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        return "Error: Only JPG, JPEG, PNG, GIF, MP4, & WEBM files are allowed.";
    }

    if ($_FILES["fileToUpload"]["size"] > 3000000) {
        return "Error: Image too large, Max 3mb";
    }

    // check if file already exists
    if (file_exists($target_file)) {
        return "Error: file already exists.";
    }


    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        $pdo = Database::getInstance()->getConnection();

        // Add File to database
        $add_image_query = 'INSERT INTO tbl_content (name, path, caption) VALUES (:name, :path, :caption)';
        $add_image = $pdo->prepare($add_image_query);
        $add_image->execute(
            array(
        ':name'=>$_FILES["fileToUpload"]["name"],
        ':path'=>$_FILES["fileToUpload"]["name"],
        ':caption'=>$caption
        )
        );

        if ($add_image) {
            return htmlspecialchars(basename($_FILES["fileToUpload"]["name"])). ' has successfully been uploaded.   
        <a href='.$target_file.' target="_blank">Link to File</a>
        ';
        } else {
            return "Error: File uploaded, error saving file.";
        }
    } else {
        return "Error: Unable to upload file.";
    }
}

?>