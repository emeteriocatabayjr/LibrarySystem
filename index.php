<?php include 'includes/header.php'; ?>
<?php include 'includes/navbar.php'; ?>
<?php include 'loginModal.php'; ?>
<div class="container p-3">
    <h1 class="text-center">List of All Books</h1>
    <hr><br>
    <form>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">Search</span>
            </div>
            <input type="text" name="search_text" id="search_text" class="form-control" />
        </div>             
    </form><br>
    <div id="result"></div>
    <hr>
</div>
</body>
<?php include 'includes/footer.php';?>
</html>
<script>


    $(document).ready(function(){

        load_data();

        function load_data(query)
        {
            $.ajax({
                url:"fetch.php",
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
