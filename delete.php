<?php
    //get title of movie
    if (isset($_GET['movie'])) {
        $title = $_GET['movie'];
        //connect to database
        include('config.php');
        $db = new SQLite3($path . '/movies.db');
        //delete query
        $sql = "DELETE FROM movies WHERE title = :title";
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':title', $title);
        $stmt->execute();
        //close database
        $db->close();
        unset($db);
        header("Location: index.php?status=deleted");
        exit();
    }
?>


