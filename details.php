<?php
    // activate db connection
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $db = "ps2db";

    $conn = new mysqli($dbhost, $dbuser, $dbpass, $db) or die("Connection failed: %s\n". $conn -> error);

    // get id from GET
    $id =  $_GET["ID"];
    // use id to query all info from database, and display for the user
    $sql = "select * from ps2games where id=$id;";
    $result = $conn->query($sql);
    if ($result->num_rows > 0)
    {
        echo "<table border = 5>";
        // output data, start with column titles
        echo 
            "<tr>
                <td>ID</td>
                <td>Title</td>
                <td>Developer</td>
                <td>Publisher</td>
                <td>Release Date</td>
            </tr>";
        // now use query to populate row of data.
        while($row = $result->fetch_assoc())
        {
            echo 
                "<tr>
                    <td>". $row["id"]. "</td>
                    <td>". $row["title"]. "</td>
                    <td>". $row["developer"]. "</td>
                    <td>". $row["publisher"]. "</td>
                    <td>". $row["date_release"]. "</td>
                </tr>";               
        }
    }
    else
    {
        echo "0 results";
    }
    echo "</table>";
    
    // these LINKS will redirect user to appropriate pages for updating or deleting.
    // each link will send the id to query the table again.
    echo "<a href='updateform.php?id=$id'>UPDATE</a><br>";
    echo "<a href='delete.php?id=$id'>DELETE</a><br>";
    // this button will return the user to the main page.
    echo "<a href='index.html'>BACK TO MAIN</a><br>"; 
    

    
    // update will take user to a new page with a prepopulated form. That form will be used to update the database on submit.
    
    // delete button will automatically delete the row in question, and send the user back to the home page.
    // can either send delete query and redirect
    // or redirect to a delete php file which will take care of the delete and send the user back to the home page.

    // close connection when finished
    $conn->close();

?>