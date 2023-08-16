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
if (isset($_POST['stdid']) && isset($_POST['password1'])) {
    // Get the username and password from the user form
    $stdid = mysqli_real_escape_string($conn, $_POST['stdid']);
    $password1 = mysqli_real_escape_string($conn, $_POST['password1']);
  
    // Query the database to see if the student ID and password match a record in the student table
    $query = "SELECT * FROM student WHERE regd_no='$stdid' AND password='$password1'";
    $result = mysqli_query($conn, $query);
    $query_name="SELECT sname FROM student WHERE regd_no='$stdid'";
    $result_name = mysqli_query($conn, $query_name);

    // If there is a match, allow the user to log in
    if (mysqli_num_rows($result) == 1) {
      // Start the user session
      session_start();
      while ($row = mysqli_fetch_assoc($result_name)) {
        $_SESSION['sname'] = $row;
    }

      $_SESSION['regd_no'] = $stdid;

      header('Location:student_home.php');
    } else {
      // If there is no match, display an error message
      echo "Invalid username or password.";
    }
  }
?>