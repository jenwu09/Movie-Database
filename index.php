<html>
    <head>
        <title>Assignment 8</title>
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>
        <h1>Movie Database</h1>
        <div id='nav_bar'>
            <div class='nav_button'><a href='index.php' class='active'>View All</a></div>
            <div class='nav_button'><a href='add_form.php'>Add Movie</a></div>
            <div class='nav_button'><a href='search_form.php'>Search Movies</a></div>
        </div>
        <hr>
        <table border="1" width="100%">
            <tr>
                <td id='movie_col'>Movie Title</td>
                <td id='year_col'>Year</td>
                <td id='option_col'>Options</td>
            </tr>
            <?php
                // connect to our database!
                include('config.php');
                $db = new SQLite3($path.'/movies.db');
                // use a SQL query to grab all movie records in alpha order
                $sql = "SELECT id, title, year FROM movies ORDER BY title, year";
                $statement = $db->prepare($sql);
                $result = $statement->execute();
                // render movie records into the table
                while ($row = $result->fetchArray()) {
                    #variables for movie info
                    $id = $row[0];
                    $title = $row[1];
                    $year = $row[2];
                    #print movie info into table
                    print "<tr>";
                    print "<td>$title</td>";
                    print "<td>$year</td>";
                    print "<td><a href='delete.php?movie=$title'>Delete</a></td>";
                    print "</tr>";
                }
                //close database connection
                $db->close();
                unset($db);
            ?>
        </table>
    </body>
</html>
