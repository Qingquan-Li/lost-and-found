<?php
session_start();

// Start output buffering
ob_start();

// Check if the user is logged in, if not then redirect to login page
if (!isset($_SESSION["UserID"]) || empty($_SESSION["UserID"])) {
    echo "Please login first. Redirecting to login page in 10 seconds...";
    header("refresh:10;url=login.php");
    echo "<br><br><a href='login.php'>Click here to go to login page now</a>";
    exit;
}

// Include the database connection file
require_once 'conn/conn.php';

// Define variables and initialize with empty values
$type = $title = $description = "";
$imageContent = null;

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $type = mysqli_real_escape_string($dbc, $_POST['type']);
    $title = mysqli_real_escape_string($dbc, $_POST['title']);
    $description = mysqli_real_escape_string($dbc, $_POST['description']);
    $userID = $_SESSION['UserID']; // Get UserID from session

    // Handle the image upload
    if (!empty($_FILES["image"]["tmp_name"])) {
        $image = $_FILES['image']['tmp_name'];
        $imageContent = addslashes(file_get_contents($image));
    }

    // Prepare an insert statement
    $query = "INSERT INTO Items (UserID, Type, Title, Description, Image) VALUES ('$userID', '$type', '$title', '$description', '{$imageContent}')";

    if (mysqli_query($dbc, $query)) {
        echo "Item posted successfully.";
    } else {
        echo "Error: " . mysqli_error($dbc);
    }
}

// End output buffering and flush output
ob_end_flush();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post an Item</title>
    <link rel="stylesheet" href="./assets/bootstrap-5.3.2-dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2 class="mt-5">Post an Item</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label>Item type (Lost or Found)</label>
                <select name="type" class="form-control">
                    <option value="lost">Lost</option>
                    <option value="found">Found</option>
                </select>
            </div>
            <div class="mb-3">
                <label>Title (Name of the item)</label>
                <input type="text" name="title" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Description</label>
                <!-- <textarea name="description" class="form-control" required></textarea> -->
                <!-- Add placeholder -->
                <textarea
                    name="description"
                    class="form-control"
                    placeholder="Please describe the item in detail..."
                    required
                ></textarea>
            </div>
            <div class="mb-3">
                <label>Item image</label>
                <input type="file" name="image" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Post</button>
        </form>
    </div>

</body>
</html>
