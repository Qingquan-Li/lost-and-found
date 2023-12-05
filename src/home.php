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
    <title>Home | Lost & Found</title>
    <link rel="stylesheet" href="./assets/bootstrap-5.3.2-dist/css/bootstrap.min.css">
    <style>
        .navbar { position: fixed; top: 0; width: 100%; }
        body { padding-top: 60px; }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Lost & Found</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link" href="post-item.php">Post</a></li>
                    <li class="nav-item"><a class="nav-link" href="register.php">Register</a></li>
                    <li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>
                    <li class="nav-item"><a class="nav-link" href="logout.php">logout</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <h2 class="mt-3">Items List</h2>
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