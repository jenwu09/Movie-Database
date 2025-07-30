<html>
    <head>
        <title>Assignment 8</title>
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>
        <h1>Movie Database</h1>
        <div id='nav_bar'>
            <div class='nav_button'><a href='index.php'>View All</a></div>
            <div class='nav_button'><a href='add_form.php' class="active">Add Movie</a></div>
            <div class='nav_button'><a href='search_form.php'>Search Movies</a></div>
        </div>
        <hr>
        <div id='message'>
            <h3>Add a new movie to the database by filling out the info below.</h3>
        </div>
        <?php
            if (isset($_GET['status'])) {
                if ($_GET['status'] == 'missinginfo') {
        ?>
                    <div class="error">Please fill out all fields.</div>
        <?php
                }
                elseif ($_GET['status'] == 'saved') {
        ?>
                    <div class="success">Movie saved.</div>
        <?php
                }
            }
        ?>
        <form action='add_save.php' method='POST'>
            <p>Movie Title:</p>
            <input type="text" name="title">
            <p>Release Year:</p>
            <input type="number" name="year">
            <input type="submit">
        </form>
        
    </body>
</html>
