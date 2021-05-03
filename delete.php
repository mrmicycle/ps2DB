<?php
    // process deletion of selected data
    // user will never see this page. 
    // redirects automatically to home page.
    
    // activate db connection
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $db = "ps2db";
 
    $conn = new mysqli($dbhost, $dbuser, $dbpass, $db) or die("Connection failed: %s\n". $conn -> error);

    // get id from GET
    $id =  $_GET["id"];
    // use id to query all info from database, and display for the user
    $sql = "DELETE FROM ps2games WHERE id=$id;";
    $result = $conn->query($sql);

    // close connection when finished
    $conn->close();
    // send user back to main page
    header("Location:index.html");
?>