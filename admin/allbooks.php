<?php include('includes/sessionstart.php'); ?>
<?php include('includes/header.php'); ?>
<?php
if(!empty($_SESSION)) {
    ?>
    <?php include('includes/navbar.php'); ?>

    <div class="container p-3">
        <h1 class="">All Books</h1>
        <hr><br>
        <form>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Search</span>
                </div>
                <input type="text" name="search_text" id="search_text" class="form-control" />
            </div>             
        </form>
        <br />
        <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#addbook_modal">Add Book</button>
        <div id="result"></div>
    </div>
    <hr>
    <?php
    }else echo '<div class="alert alert-danger alert-dismissible fade show">
    <strong>Login Required!</strong> You needed to be login first before you can access the database.
    <a href="login.php"> Go back to login</a>
    </div>';
    ?>
</body>
</html>
<?php include 'modals/allbooks_modal.php' ?>
<?php include 'scripts/allbooks.js' ?>