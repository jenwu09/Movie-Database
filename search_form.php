<html>
    <head>
        <title>Assignment 8</title>
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>
        <h1>Movie Database</h1>
        <div id='nav_bar'>
            <div class='nav_button'><a href='index.php'>View All</a></div>
            <div class='nav_button'><a href='add_form.php'>Add Movie</a></div>
            <div class='nav_button'><a href='search_form.php' class="active">Search Movies</a></div>
        </div>
        <hr>
        <div id='message'>
            <h3>Search for movies in the database by a keyword, full title, and//or year.</h3>
        </div>
        <form action='search_form.php' method='POST'>
            <p>Movie Title/Keyword:</p>
            <input type="text" name="title">
            <p>Release Year:</p>
            <input type="number" name="year">
            <input type="submit" value='Search'>
        </form>

        <?php
            //get data that was just entered
            $title = $_POST['title'];
            $year = $_POST['year'];

            //where title has value but no year
            if (!empty($title) && empty($year)) {
                //connect to database
                include('config.php');
                $db = new SQLite3($path.'/movies.db');
                //select based on conditions
                $sql = "SELECT title, year FROM movies WHERE title LIKE :title";
                $statement = $db->prepare($sql);
                $statement->bindValue(':title', '%'.$title.'%'); //googled for help
                $result = $statement->execute();
                //show results
                while ($row = $result->fetchArray()) {
                    $title = $row[0];
                    $year = $row[1];
                    #print movie info into table
                    print "<ul>";
                    print "<li>$title ($year)</li>";
                    print "</ul>";
                }
                
                //close database
                $db->close();
                unset($db);
            }
            //where year has value but no title
            elseif (empty($title) && !empty($year)) {
                //connect to database
                include('config.php');
                $db = new SQLite3($path.'/movies.db');
                //select based on conditions
                $sql = "SELECT title, year FROM movies WHERE year = :year";
                $statement = $db->prepare($sql);
                $statement->bindValue(':year', $year);
                $result = $statement->execute();
                //show results
                while ($row = $result->fetchArray()) {
                    $title = $row[0];
                    $year = $row[1];
                    #print movie info into table
                    print "<ul>";
                    print "<li>$title ($year)</li>";
                    print "</ul>";
                }
                //close database
                $db->close();
                unset($db);
            }
            //title and year has values
            elseif (!empty($title) && !empty($year)) {
                //connect to database
                include('config.php');
                $db = new SQLite3($path.'/movies.db');
                //select based on conditions
                $sql = "SELECT title, year FROM movies WHERE title = :title AND year = :year";
                $statement = $db->prepare($sql);
                $statement->bindValue(':title', $title);
                $statement->bindValue(':year', $year);
                $result = $statement->execute();
                //show results
                while ($row = $result->fetchArray()) {
                    $title = $row[0];
                    $year = $row[1];
                    #print movie info into table
                    print "<ul>";
                    print "<li>$title ($year)</li>";
                    print "</ul>";
                }
                //close database
                $db->close();
                unset($db);
            }
        ?>

    </body>
</html>
