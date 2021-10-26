<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <a href="allbooks.php" class="navbar-brand">All Books</a>
    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div id="navbarCollapse" class="collapse navbar-collapse">
        <ul class="nav navbar-nav">
            <li class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Transactions</a>
                <div class="dropdown-menu">
                    <a href="borrowing.php" class="dropdown-item">Borrowing</a>
                    <div class="dropdown-divider"></div>
                    <a href="returning.php" class="dropdown-item">Returning</a>
                </div>
            </li>
        </ul>
        <ul class="nav navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Accounts</a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a href="librarian.php" class="dropdown-item">Librarian</a>
                    <a href="borrower.php" class="dropdown-item">Borrowers</a>
                    <div class="dropdown-divider"></div>
                    <a href="logout.php"class="dropdown-item">Logout</a>
                </div>
            </li>
        </ul>
    </div>
</nav>