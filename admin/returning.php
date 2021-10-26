<?php include('includes/sessionstart.php'); ?>
<?php include('includes/header.php'); ?>


<?php
if(!empty($_SESSION)) {
	?>
    <?php include('includes/navbar.php'); ?>
	<div class="container p-3">
		<h1 class="">Returning</h1>
		<hr><br>
		<div class="input-group">
			<div class="input-group-prepend">
				<span class="input-group-text">Search</span>
			</div>
			<input type="text" name="search_text" id="search_text" class="form-control" />
		</div>
		<br>
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
<script>


    $(document).on('click', '#returnbtn', function(){
        var borrower_id = $(this).attr("bookid");
        $.ajax({
            url:"returning_returned.php",
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
         url:"returning_delete.php",
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

        function load_data(query)
        {
            $.ajax({
                url:"returning_fetch.php",
                method:"POST",
                data:{query:query},
                success:function(data)
                {
                    $('#result').html(data);
                }
            });
        }
        $('#search_text').keyup(function(){
            var search = $(this).val();
            if(search != '')
            {
                load_data(search);
            }
            else
            {
                load_data();
            }
        });
    });

</script>

<div id="editbook_modal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Returning Selected Book</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body" id="borrower_detail">

            </div>
            <div class="modal-footer">

            </div>
        </div>
    </div>
</div>