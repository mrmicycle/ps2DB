<?php
    // this page  processes the update.
    // user will never see this page.
    // redirects automatically to home page.

    // activate db connection
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $db = "ps2db";
 
    $conn = new mysqli($dbhost, $dbuser, $dbpass, $db) or die("Connection failed: %s\n". $conn -> error);

    $id = $_GET['id'];
    $title = $_GET['title'];
    $developer = $_GET['developer'];
    $publisher = $_GET['publisher'];
    $release = $_GET['date_release'];

    $sql = "UPDATE ps2games SET title = '$title', developer = '$developer', publisher = '$publisher', date_release = '$release' WHERE `id` = '$id';";
    
	// echo $sql; // uncomment for debug
	$request = $conn->query($sql);
    // close connection when finished
    $conn->close();
	// send user back to main page
	header("Location:index.html");


    

?>