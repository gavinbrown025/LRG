<?php

require_once '../../load.php';

    $announcements = array();

    function getAnnouncements(){
        $pdo = Database::getInstance()->getConnection();
        $queryAll = "SELECT * FROM tbl_announcements";
        $runAll = $pdo->query($queryAll);
        $announcements = $runAll->fetchAll(PDO::FETCH_ASSOC); //* PAN

        echo (json_encode($announcements));
    }

    $allAnnouncements = getAnnouncements();
    return $allAnnouncements;