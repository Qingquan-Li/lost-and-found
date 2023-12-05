<?php
require_once './conn/conn.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve and sanitize user inputs
    $email = mysqli_real_escape_string($dbc, $_POST['email']);
    $password = mysqli_real_escape_string($dbc, $_POST['password']);

    // Prepare the SQL statement
    // $query = "SELECT UserID, Email, Password FROM Users WHERE Email = '$email'";
    // Prepare the SQL statement to include Username
    $query = "SELECT UserID, Email, Password, Username FROM Users WHERE Email = '$email'";

    // Execute the query
    $result = mysqli_query($dbc, $query);

    if ($result) {
        $row = mysqli_fetch_assoc($result);

        // Verify the password
        if (password_verify($password, $row['Password'])) {
            // Start the session and set session variables
            session_start();
            $_SESSION['UserID'] = $row['UserID'];
            $_SESSION['Email'] = $row['Email'];
            // Store Username in session
            $_SESSION['Username'] = $row['Username'];

            // echo "Login successful. <a href='index.php'>Go to home page</a>";
            // Redirect to home page
            header("Location: index.php");
        } else {
            echo "Invalid email or password.";
        }
    } else {
        echo "Error: " . mysqli_error($dbc);
    }
}
mysqli_close($dbc);
?>
