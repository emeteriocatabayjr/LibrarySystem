<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <a href="index.php" class="navbar-brand">Home</a>
    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div id="navbarCollapse" class="collapse navbar-collapse">
 
        <ul class="nav navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Login as</a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a href="login.php" class="dropdown-item" data-toggle="modal" data-target="#loginUserModal">Borrower</a>
                    <div class="dropdown-divider"></div>
                    <a href="admin/login.php"class="dropdown-item">Librarian</a>
                </div>
            </li>
        </ul>
    </div>
</nav>