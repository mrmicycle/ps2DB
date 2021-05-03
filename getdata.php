<?php
    // connect to database.
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $db = "ps2db";

    $conn = new mysqli($dbhost, $dbuser, $dbpass, $db) or die("Connection failed: %s\n". $conn -> error);
    // change the sql to get all from table under a certain case (when the user has not typed anything);
    if (isset($_GET['showall']))
    {
        // limit results to 30.
        $sql = "select * from ps2games limit 30;";
    }
    // change the sql for whatever the user is typing
    else if (isset($_GET['kw']))
    {
        $kw = $_GET['kw'];
        // make the database searchable by title or id.
        $sql = "select * from ps2games where title like '%" . $kw . "%' or id like '%" . $kw . "%' limit 30;";
    }
    // send query to db
    $result = $conn->query($sql);

    // show results of that query
    if ($result->num_rows > 0)
    {
        echo "<table border = 5>";
        // output data of each row
        echo 
            "<tr>
                <td>ID</td>
                <td>Title</td>
            </tr>";
        while($row = $result->fetch_assoc())
        {
            // make ID's clickable. 
            // I didn't make the title's clickable as some titles would not send properly over GET due to special characters. Also easier and less data to send over GET.
            echo 
                "<tr>
                    <td><a href=details.php?ID=". $row["id"]. ">" . $row["id"] . "</a></td>
                    <td>". $row["title"]. "</td>
                    
                </tr>";               
        }
    }
    else
    {
        echo "0 results";
    }
    echo "</table>";
    $conn->close();

?>