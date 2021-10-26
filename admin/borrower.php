
<?php include('includes/sessionstart.php'); ?>
<?php include('includes/header.php'); ?>
<?php if(!empty($_SESSION)) {
?>
<?php include('includes/navbar.php'); ?>
    <div class="container p-3">
        <h1 class="">Borrowers</h1>
        <hr><br>
        <form>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Search</span>
                </div>
                <input type="text" name="search_text" id="search_text" class="form-control" />
            </div>				
        </form><br />
        <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#addLib_modal">Add Borrower</button>
        <div id="result"></div>
    </div>
    <hr>
    <?php
    }else 
        echo'<div class="alert alert-danger alert-dismissible fade show">
            <strong>Login Required!</strong> You needed to be login first before you can access the database.
            <a href="login.php"> Go back to login</a>
            </div>';
    ?>
</body>
</html>

<script>
    $(document).ready(function(){
        $('#addLib_form').on("submit", function(event){  
            event.preventDefault();     
            if($('#borrowername').val() == ""){  
                alert("Borrower Name is required");  
            }  
            else if($('#username').val() == ''){  
                alert("Username is required");  
            }  
            else if($('#password').val() == ''){  
                alert("Password is required");  
            }
            else{  
                $.ajax({  
                    url:"borrower_insert.php",  
                    method:"POST",  
                    data:$('#addLib_form').serialize(),  
                    beforeSend:function(){  
                        $('#addLibbtn').val("Inserting");  
                    },  
                    success:function(data){  
                        $('#addLib_form')[0].reset();  
                        $('#addLib_modal').modal('hide');
                        $('#result').html(data);
                    }  
                });  
            }  
        });
    });

    $(document).on('click', '#editbtn', function(){
        var borrower_id = $(this).attr("bookid");
        $.ajax({
            url:"borrower_update.php",
            method:"POST",
            data:{borrower_id:borrower_id},
            success:function(data){
                $('#borrower_detail').html(data);
                $('#editbook_modal').modal('show');
            }
        });
   });

    $(document).on('click', '#deletebtn', function(){
        var borrower_id = $(this).attr("bookid");
        $.ajax({
            url:"borrower_delete.php",
            method:"POST",
            data:{borrower_id:borrower_id},
            success:function(data){
                $('#borrower_detail').html(data);
                $('#editbook_modal').modal('show');
            }
        });
    });


    $(document).ready(function(){
        load_data();

        function load_data(query){
            $.ajax({
                url:"borrower_fetch.php",
                method:"POST",
                data:{query:query},
                success:function(data){
                    $('#result').html(data);
                }
            });
        }

        $('#search_text').keyup(function(){
            var search = $(this).val();
            if(search != ''){
                load_data(search);
            }
            else{
                load_data();
            }
        });
    });

</script>

<div id="addLib_modal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Borrower</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form method="POST" id="addLib_form" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Full Name:</label>
                        <input type="text" name="borrowername" id="borrowername" required="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Full Address:</label>
                        <input type="text" name="address" id="address" required="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Contact No:</label>
                        <input type="text" name="contactnumber" id="contactnumber" required="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Username:</label>
                        <input type="text" name="username" id="username" required="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Password:</label>
                        <input type="text" name="password" id="password" required="" class="form-control">
                    </div>
             
                    <div class="form-group">
                        <button type="submit" id="addLibbtn" class="btn btn-success btn-block submit">Add</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">

            </div>
        </div>
    </div>
</div>

<div id="editbook_modal" class="modal fade">
	<div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Book Details</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body" id="borrower_detail">

            </div>
            <div class="modal-footer">

            </div>
        </div>
    </div>
</div>

