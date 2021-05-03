<?php
    // activate db connection
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $db = "ps2db";
 
    $conn = new mysqli($dbhost, $dbuser, $dbpass, $db) or die("Connection failed: %s\n". $conn -> error);

    // take id from $_GET
    // query db to get info
    // use info to populate a form
    // on submit, send the query information to update.php


    // get id from GET
    $id =  $_GET["id"];
    // use id to query all info from database, and display for the user
    $sql = "select * from ps2games where id=$id;";
    $result = $conn->query($sql);

    if ($result->num_rows > 0)
    {
    // form from previous assignment
        echo "Use this form to update entry:<br>";
        echo "<a href='index.html'>Cancel</a><br>";

        // create a form using values from db query
        // fill the form with default values.
        // form values will be sent to update.php
        
        // hidden is used to send ID.
        // only doing this once since we're only querying one item.
        // IDS ARE NOT EDITABLE! It's a primary key that Auto Increments
        $row = $result->fetch_assoc();
        echo 
            "<form action='update.php' method='GET'>
                <label for='title'>Title:</label>
                <input type='text' name='title' value='" .  $row['title'] . "'>
                <label for='developer'>Developer:</label>
                <input type='text' name='developer' value='" . $row['developer'] . "'>
                <label for='publisher'>Publisher:</label>
                <input type='text' name='publisher' value='" . $row['publisher'] . "'>
                <label for='date_release'>Release Date:</label>
                <input type='text' name='date_release' value='" . $row['date_release'] . "'><br>
                <input type='hidden' name='id' value = '" . $row['id'] . "'><br>
                <input type=submit value='update'>
            </form><br>";
        // close connection when finished
        $conn->close();
    }
    
?> 