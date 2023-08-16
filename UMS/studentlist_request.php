<?php

    session_start();
    $servername = "127.0.0.1";
    $username = "root";
    $password = "";
    $db="samveda";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password,$db);

    // Check connection
    if (!$conn) 
    {
        die("Connection failed: " . mysqli_connect_error());
    }
    echo "";

    $course=$_SESSION['sel_course'];
    echo "Attendance sheet for course  ";
    echo $course;
    echo '<br><br><br>';

    // Step 2: Retrieve data from your database
    $sql = "SELECT regd_no , sname FROM student WHERE course1='$course' or course2='$course' or course3='$course'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) 
    {
        echo "<form method='post' action='#'>";
        echo "<table class='table'>";
        echo "<tr><th>Regd.No</th><th>Name</th><th>Status</th></tr>";
        while($row = mysqli_fetch_assoc($result))
        {
        echo "<tr><td>" . $row["regd_no"] . "</td><td>" . $row["sname"] ."</td><td>"."<select name=".$row['regd_no']."><option>Present</option><option>Absent</option></select>"."</td></tr>";
        }
        echo "</table>";
        echo "</form>";
    }
?>

<html>
    <head>
        <style>
            .table ,th, td
            {
                border:1px solid;
                border-collapse:collapse;
            }

            td,th
            {
                padding:2px 20px;
                text-align:center;
            }

        </style>
    </head>
    <body>
        <form method="post" action="#">
            <br>
            <br>
            <input type="submit" value="post" name="submit">
        </form>
    </body>
</html>


<?php

if(isset($_POST['submit']))
{
    $column_name = date('Y_m_d');

    $sql1 = "ALTER TABLE  ADD COLUMN $column_name VARCHAR(255)";
    mysqli_query($conn, $sql1);

}


?>