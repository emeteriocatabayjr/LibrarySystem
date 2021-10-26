<nav class="navbar navbar-expand-md navbar-dark bg-dark navbar-block">
    <a href="home.php" class="navbar-brand">Home</a>
    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div id="navbarCollapse" class="collapse navbar-collapse">
        <ul class="nav navbar-nav">
            <li class="nav-item dropdown">
                <a href="" class="nav-link dropdown-toggle" data-toggle="dropdown">Books</a>
                <div class="dropdown-menu">
                    <a href="borrowed.php" class="dropdown-item">Borrowed</a>
                    <div class="dropdown-divider"></div>
                    <a href="returned.php"class="dropdown-item">Returned</a>
                </div>
            </li>
        </ul>
        <ul class="nav navbar-nav ml-auto">
            <img src="uploads/<?php echo $_SESSION['image']; ?>" class="rounded-circle" style="width:40px; height: 40px;">
            <li class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">My Account</a>
                <div class="dropdown-menu dropdown-menu-right">
                   
                    <a href="myprofile.php" class="dropdown-item">My Profile</a>
                    <div class="dropdown-divider"></div>
                    <a href="logout.php"class="dropdown-item">Logout</a>
                </div>
            </li>
        </ul>
    </div>
</nav>