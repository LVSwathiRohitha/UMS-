<?php
session_start();
?>


<html>

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" 
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

          <link rel="shortcut icon" type="image/png" href="images/favicon.png">

    <title>Samveda Institutes - student Home page</title>
    <style>
            body
            {
                font-family: Verdana, Geneva, Tahoma, sans-serif;
                margin:1%;
                padding:1%;
                box-sizing: border-box;
                background-color:rgb(243, 243, 243);
            }
            #top
            {
                background-color:rgb(199, 2, 2);
                display: flex;
                width:100%;
                height:10%;
                position:static;
            }
            #img
            {
                background-color: rgb(12, 2, 2);
                float: inline-start;

            }
            #title
            {
                color:white;
                float:inline-end;
                padding:1.5%;
            }

            span
            {
                color:rgb(199, 2, 2);
                font-size:20px;
                font-weight:bold;
            }

            #footer
            {
                background-color:rgb(192,2,2);
                color:white;
                height:15%;
                margin-top:18%;
            }

            nav 
            {
                background-color: grey;
                height: 6%;

            }

            nav ul 
            {
                list-style: none;
                margin: 0;
                padding: 0;
                display: flex;
            }

            nav li 
            {
                margin: 0 0.05%;
                background-color:black;
            }

            nav a 
            {
                display: block;
                color:white;
                text-decoration: none;
                padding: 10px 15px;
            }

            nav li a:hover 
            {
                background-color: grey;
                color: #fff;
            }

            .dropbtn 
            {
                padding-top: 4%;
                padding-bottom: 4%;
                font-size: 16px;
                border: none;
                cursor: pointer;
                width:18.9vw;
                background-color:black;
                color:white;
                margin:0.05%;
            }

            .dropdown-content 
            {
                display: none;
                position: absolute;
                box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
                z-index: 1;
            }

            .dropdown-content a 
            {
                padding: 12px 80px;
                text-decoration: none;
                display: block;
                color:black;
                cursor:pointer;
            }

            .dropdown-content a:hover 
            {
                background-color:rgb(192,2,2);
                color:white;
            }

            .dropdown:hover .dropdown-content 
            {
                display: block;
            }

            .dropdown:hover .dropbtn 
            {
                background-color:grey;
            }

            .dropdown 
            {
                position: relative;
                display: inline-block;
                background-color:grey;
            }

            </style>

</head>


<body>
        <div id="top">
            <div id="img"><img src="images/favicon.png" width="100%" height="100%"></div>
            <div id="title">  SAMVEDA INSTITUTES</div>
        </div>

        <br>
        <br>

            <?php echo "<span>Welcome</span>  ".$_SESSION['sname']['sname'];
            $id=$_SESSION['regd_no']; ?>
            
            <br>
            <br>
            
            <?php
            
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
            $query = "SELECT profile_picture FROM student WHERE student.regd_no = '$id' ";
            $result = mysqli_query($conn, $query);
            $row = mysqli_fetch_assoc($result); 
            $profile_picture=$row['profile_picture'];
            echo "<img src='$profile_picture' alt='profile_picture' width=10% height=20%>";
            ?>

            <br>
            <br>
            <br>

            <div id="main">

            <nav>
                <ul>
                <li><div class="dropdown" id="nav-academics"><button class="dropbtn">Academics</button>
                <div class="dropdown-content">
                    <a>Time Table</a>
                    <a>Attendance</a>
                    <a>Project Upload</a>
                    <a>class Materials</a>
                </div>
                </div></li>

                <li><div class="dropdown" id="nav-examinations"><button class="dropbtn">Examinations</button>
                <div class="dropdown-content">
                    <a>Exam schedule</a>
                    <a>Marks</a>
                </div>
                </div></li>

                <li><div class="dropdown" id="nav-courses"><button class="dropbtn">Courses</button>
                <div class="dropdown-content">
                </div>
                </div></li>

                <li><div class="dropdown" id="nav-payments"><button class="dropbtn">Payments</button>
                <div class="dropdown-content">
                </div>
                </div></li>

                <li><div class="dropdown" id="nav-changepassword"><button class="dropbtn">Change Password</button>
                <div class="dropdown-content">
                </div>
                </div></li>
                </ul>
            </nav>

            </div>



            <br>
            <br>

            <div id="footer">
                <h3>Contact Us</h3>
            </div>
</body>

</html>
