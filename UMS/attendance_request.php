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


    $id=$_SESSION['fac_id'];

    // Step 2: Retrieve data from your database
    $sql = "SELECT course1,course2,course3 FROM faculty WHERE fac_id='$id'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) 
    {
        $row = mysqli_fetch_assoc($result); 
       /* $course1=$row["course1"];
        $course2=$row["course2"];
        $course3=$row["course3"];*/
    }
?>

<html>
    <head>
        <style>
           

        </style>

    </head>

    <body>
        <div id="out-cont">
                <form method="post" action="#">
                    <select name="course_select">
                        <option><?php echo $row["course1"]; ?></option>
                        <option><?php echo $row["course2"]; ?></option>
                        <option><?php echo $row["course3"]; ?></option>
                    </select>
                    <br>
                    <br>
                    <br>
                    <input type="submit" name="submit">
                </form>

          
                
        </div>

        <script>
            function go() 
            {
                var request = new XMLHttpRequest();
                request.onreadystatechange = function() 
                {
                    if (this.readyState == 4 && this.status == 200) 
                    {
                        window.open("studentlist_request.php");
                    }
                };
                request.open("POST", "studentlist_request.php", true);
                request.send();
            }    
        </script>

    </body>
    
</html>


                    <?php 
                    if(isset($_POST['submit']))
                    {
                    $_SESSION['sel_course']=$_POST["course_select"]; 
                    echo $_POST['course_select']; 
                    header('location:studentlist_request.php');
                    }
                    ?>

