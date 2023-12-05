<?php
require_once './conn/conn.php';
session_start();

if (isset($_GET['item_id'])) {
    $item_id = mysqli_real_escape_string($dbc, $_GET['item_id']);

    // Fetch item details from the database
    $query = "SELECT * FROM Items WHERE ItemID = '$item_id'";
    $result = mysqli_query($dbc, $query);
    $item = mysqli_fetch_assoc($result);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Item Detail</title>
    <link rel="stylesheet" href="./assets/bootstrap-5.3.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/css/common.css">
</head>
<body>
    <?php include 'navbar.php'; ?>
    <div class="container">
        <?php
            if ($item) {
                echo "<h1>" . htmlspecialchars($item['Title']) . "</h1>";
                if ($item['Image']) {
                    echo "<img
                        src='data:image/jpeg;base64,".base64_encode($item['Image'])."'
                        class='img-thumbnail'
                    />";
                }
                echo "<p>" . htmlspecialchars($item['Description']) . "</p>";
                // Add more details as needed
            } else {
                echo "<p>Item not found.</p>";
            }
        ?>
    </div>
    
</body>
</html>