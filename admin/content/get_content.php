<?php

require_once '../../load.php';

    $images = array();

    function getImages(){
        $pdo = Database::getInstance()->getConnection();

        $queryAll = "SELECT * FROM tbl_content";
        $runAll = $pdo->query($queryAll);

        $images = $runAll->fetchAll(PDO::FETCH_ASSOC); //* PAN

    /*  Trevor -- puts each object in its own array
    while($row = $runAll->fetchAll(PDO::FETCH_ASSOC)) {
        $images[] = $row;
    }*/

        echo (json_encode($images));
    }

    $allImages = getImages();
    return $allImages;
