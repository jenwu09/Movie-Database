<?php
    //get data that was just entered
    $title = $_POST['title'];
    $year = $_POST['year'];
    // make sure the user filled everything out
    if (empty($title) || empty($year)) {
        // if not, generate an error message
        header("Location: add_form.php?status=missinginfo");
        exit();
    }
    //connect to database
    include('config.php');
    $db = new SQLite3($path.'/movies.db');
    //add movie to database
    $sql = "INSERT INTO movies (title, year) VALUES (:title, :year)";
    $statement = $db->prepare($sql);
    $statement->bindValue(':title', $title);
    $statement->bindValue(':year', $year);
    $statement->execute();
    //close database
    $db->close();
    unset($db);

    header("Location: add_form.php?status=saved");
    exit();
?>

