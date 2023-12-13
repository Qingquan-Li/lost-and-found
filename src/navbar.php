<nav class="navbar navbar-expand-lg fixed-top navbar-light bg-light">
    <div class="container-md">
        <a class="navbar-brand mb-0 h1" href="/">BMCC · Lost and Found</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
        aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav ms-auto">
            <!-- <a class="nav-link" href="register.php">Register</a> -->
            <?php if(isset($_SESSION['UserID'])): ?>
                <span class="navbar-text">
                    Welcome, <?php echo htmlspecialchars($_SESSION['Username']); ?>
                </span>
                &nbsp;
                <a class="nav-link" href="post-item.php">Post</a>
                <a class="nav-link" href="logout.php">Logout</a>
            <?php else: ?>
                <a class="nav-link" href="post-item.php">Post</a>
                <a class="nav-link" href="register.php">Register</a>
                <a class="nav-link" href="login.php">Login</a>
            <?php endif; ?>
        </div>
        </div>
    </div>
</nav>
