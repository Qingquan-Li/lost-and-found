<?php
require_once './conn/conn.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve and sanitize user inputs
    $email = mysqli_real_escape_string($dbc, $_POST['email']);
    // Extract the username from the email
    $username = explode('@', $email)[0];
    $password = mysqli_real_escape_string($dbc, $_POST['password']);

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Prepare the SQL statement
    $query = "INSERT INTO Users (Email, Username, Password) VALUES ('$email', '$username', '$hashed_password')";

    // Execute the query
    if (mysqli_query($dbc, $query)) {
        echo "Registration successful. <a href='login.php'>Login here</a>";
    } else {
        echo "Error: " . mysqli_error($dbc);
    }
}
mysqli_close($dbc);
?>
