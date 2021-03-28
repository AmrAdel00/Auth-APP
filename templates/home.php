<?php
    if(!isset($_SESSION['username'])){
        header('location: index.php?page=login');
    }
?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="?page=home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?page=logout">logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="container">
    <div class="alert alert-primary mt-5" role="alert">
        Welcome to Home Page <?php echo $_SESSION['username']; ?>
    </div>
</div>
