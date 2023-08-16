<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$db="samveda";
// Create connection
$conn = mysqli_connect($servername, $username, $password,$db);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
echo "";

// Check if the student ID and password are present
if (isset($_POST['facid']) && isset($_POST['password2'])) {
    // Get the username and password from the user form
    $facid = mysqli_real_escape_string($conn, $_POST['facid']);
    $password2 = mysqli_real_escape_string($conn, $_POST['password2']);
  
    // Query the database to see if the student ID and password match a record in the student table
    $query = "SELECT * FROM faculty WHERE fac_id='$facid' AND password='$password2'";
    $result = mysqli_query($conn, $query);
    $query_name="SELECT fname FROM faculty WHERE fac_id='$facid'";
    $result_name = mysqli_query($conn, $query_name);


    // If there is a match, allow the user to log in
    if (mysqli_num_rows($result) == 1) {
      // Start the user session
      session_start();
      while ($row = mysqli_fetch_assoc($result_name)) {
        $_SESSION['fname'] = $row;
    }

    $_SESSION['fac_id'] = $facid;

      header('Location:faculty_home.php');
    } else {
      // If there is no match, display an error message
      echo "Invalid username or password.";
    }
  }
?>