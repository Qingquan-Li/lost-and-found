<?php
require_once './conn/conn.php';
session_start();

// Fetch all items from the database
$query = "SELECT * FROM Items ORDER BY PostTime DESC";
$result = mysqli_query($dbc, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BMCC Lost and Found</title>
    <link rel="stylesheet" href="./assets/bootstrap-5.3.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/css/common.css">
</head>
<body>
    <?php include 'navbar.php'; ?>

    <div class="container">
        <?php
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<div class='card mb-3'>";
                echo "<div class='card-body'>";
                echo "<h5 class='card-title'>" . htmlspecialchars($row['Title']) . "</h5>";
                if ($row['Image']) {
                    echo "<img
                        src='data:image/jpeg;base64,".base64_encode($row['Image'])."'
                        class='img-thumbnail'
                    />";
                }
                echo "<p class='card-text'>" . htmlspecialchars($row['Description']) . "</p>";
                echo "<a href='item-detail.php?item_id=" . $row['ItemID'] . "' class='btn btn-primary'>View Details</a>";
                echo "</div>";
                echo "</div>";
            }
        } else {
            echo "<p>No items found.</p>";
        }
        ?>
    </div>
    
    <script src="./assets/bootstrap-5.3.2-dist/js/bootstrap.bundle.min.js"></script>
  </body>
</body>
</html>
