<?php

    session_start();
    $servername = "127.0.0.1";
    $username = "root";
    $password = "";
    $database="";
    // Create connection
    $conn = mysqli_connect($servername, $username, $password,$database);

    // Check connection
    if (!$conn) 
    {
        die("Connection failed: " . mysqli_connect_error());
    }
    echo "";

    $id=$_SESSION['fac_id'];

    // Step 2: Retrieve data from your database
    $sql = "SELECT course1,course2,course3 FROM faculty WHERE fac_id='$id'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) 
    {
        while($row = mysqli_fetch_assoc($result)) 
        {
            echo "<table><tr><th>Course 1</th><th>Course 2</th><th>Course 3</th></tr>";
            echo "<tr><td>" . $row["course1"] . "</td><td>" . $row["course2"] . "</td><td>".$row["course3"]."</td></tr></table>";
        }
    } 
    else 
    {
        echo "0 results";
    }
?>